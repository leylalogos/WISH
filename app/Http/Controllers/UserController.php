<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.user-profile', compact('user'));
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'birthday' => 'before:today',
            'phone_number' => 'string|max:15|min:2',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->back();
    }
}
