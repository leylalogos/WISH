<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected function _registerOrLoginUser($data, $provider)
    {

        $account = Account::where('provider_id', $data->id)->where('provider', $provider)->first();
        if (!$account) {
            $user = new User();
            $user->name = $data->name;
            $user->generateUsername($data->email);
            $user->save();
            $account = new Account();
            $account->user_id = $user->id;
            $account->provider = $provider;
            $account->provider_id = $data->id;
            $account->username = $data->name; //put name temporary
            $account->avatar = $data->avatar;
            $account->email = $data->email;
            $account->last_login = Carbon::now();
            $account->save();
        }
        Auth::login($account->user);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google callback

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerorLoginUser($user, 'google');
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {

        $user = Socialite::driver('facebook')->user();
        $this->_registerorLoginUser($user, 'facebook');
        return redirect()->route('index');
    }
}
