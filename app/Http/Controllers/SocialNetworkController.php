<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    public function update(User $user, Request $request)
    {
        $user = Auth::user();
        $platforms = ['instagram', 'facebook', 'twitter'];
        foreach ($platforms as $platform) {
            if ($request->$platform) {
                SocialNetwork::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'platform' => $platform,
                    ],
                    [
                        'username' => $request->$platform,
                    ]
                );
            }
        }
        return redirect()->back();
    }
}
