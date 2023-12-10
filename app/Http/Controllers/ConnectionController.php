<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Auth;

class ConnectionController extends Controller
{
    public function index()
    {
        $followedRequestUsers = Auth::user()->followedByRequestedUsers;
        return view('pages/my-connection', compact('followedRequestUsers'));
    }
    public function approve($user_id)
    {
        Connection::where('following_id', $user_id)->where('followed_id', Auth::id())->update([
            'is_confirmed' => true]
        );
        session()->flash('message.success',
            'درخواست دوستی پذیرفته شد.'
        );
        return redirect()->back();

    }
    public function reject($user_id)
    {
        Connection::where('following_id', $user_id)->where('followed_id', Auth::id())->delete();
        session()->flash('message.success',
            'درخواست دوستی رد شد.'
        );
        return redirect()->back();
    }

    public function follow($user_id)
    {
        Auth::user()->follow($user_id, 'follow_back');
        session()->flash('message.success',
            'شما با هم دوست شدید.'
        );
        return redirect()->back();
    }
}
