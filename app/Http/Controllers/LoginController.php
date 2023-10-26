<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected function _registerOrLoginUser($data, $provider)
    {
        DB::transaction(function () use ($data, $provider) {

            $account = Account::where('provider_id', $data->id)->where('provider', $provider)->first();
            if (!$account) {
                $user = new User();
                $user->name = $data->name;
                $user->generateUsername($data->email);
                $user->save();
                $account = $this->createAccount($data, $provider, $user);
            }
            Auth::login($account->user);
        });
    }

    private function createAccount($data, $provider, $user)
    {

        $account = new Account();
        $account->user_id = $user->id;
        $account->provider = $provider;
        $account->provider_id = $data->id;
        $account->username = $data->name; //put name temporary
        $account->avatar = $data->avatar;
        $account->email = $data->email;
        $account->last_login = Carbon::now();
        $account->save();
        return $account;

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    private function addAccount($data, $provider, $user)
    {
        $account = Account::where('provider_id', $data->id)->where('provider', $provider)->first();
        if (!$account) {
            $this->createAccount($data, $provider, $user);
        } else {
            $account->last_login = Carbon::now();
            $account->avatar = $data->avatar;
            $account->save();
        }
    }
    //Google callback

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        if (!Auth::check()) {
            $this->_registerorLoginUser($user, 'google');
            return redirect()->route('index');
        } else {
            $this->addAccount($user, 'google', Auth::user());
            return redirect()->route('profile');
        }

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
        if (!Auth::check()) {
            $this->_registerorLoginUser($user, 'facebook');
            return redirect()->route('index');
        } else {
            $this->addAccount($user, 'facebook', Auth::user());
            return redirect()->route('profile');
        }
    }
}
