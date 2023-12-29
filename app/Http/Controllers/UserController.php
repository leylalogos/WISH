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
        return view('pages.user-account', compact('user'));
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'string|min:2|max:255',
            'phone_number' => 'string|max:15|min:2',
            'username' => 'unique:users,username',
        ]);

        $user = Auth::user();
        $user->update($request->all());
        session()->flash('message.success',
            'اطلاعات با موفقیت ذخیره شد'
        );
        return redirect()->route('account.setting');
    }

    public function acceptInvitation($username)
    {
        Auth::user()->follow(User::where('username', $username)->first()->id, 'invite_link');
        return redirect()->route('index');
    }
}
