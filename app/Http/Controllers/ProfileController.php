<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('pages/user-profile', compact('user'));
    }
}
