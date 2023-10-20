<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function update(User $user, Request $request)
    {
        $user = Auth::user();
        $providers = ['instagram', 'facebook', 'twitter'];
        foreach ($providers as $provider) {
            if ($request->$provider) {
                Account::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'provider' => $provider,
                    ],
                    [
                        'username' => $request->$provider,

                    ]
                );
            }
        }
        return redirect()->back();
    }
}
