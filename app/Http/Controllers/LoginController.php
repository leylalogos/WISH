<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function login()
    {
        return view('pages/login');
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');

    }

    public function redirectToProvider(Request $request, $provider)
    {
        $request->validate(['provider|in:google,facebook']);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $request->validate(['provider|in:google,facebook']);
        $providerUserInfo = Socialite::driver($provider)->user();
        if (!Auth::check()) {
            $this->_registerorLoginUser($providerUserInfo, $provider);
            return redirect($request->session()->pull('url.intended', route('index')));
        } else {
            $this->addAccount($providerUserInfo, $provider, Auth::user());
            return redirect()->route('profile');
        }
    }
}
