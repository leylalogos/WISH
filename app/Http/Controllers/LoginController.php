<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected function _registerOrLoginUser($data)
    {
        $user = User::where('
        email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->save();
        }
        Auth::login($user);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google callback

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerorLoginUser($user);
        return redirect()->route('index');
    }
}
