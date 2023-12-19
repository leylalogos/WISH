<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Auth;

class ConnectionController extends Controller
{
    public function myFollowersIndex()
    {
        $user = Auth::user();
        $followers = $user->followedByConfirmedUsers;
        return view('pages/connections/my-followers', compact('followers', 'user'));
    }
    public function myFollowingsIndex()
    {
        $user = Auth::user();
        $followings = $user->followingConfirmedUsers;
        return view('pages/connections/my-followings', compact('followings', 'user'));
    }
    public function myFrindsIndex()
    {
        $user = Auth::user();
        $friends = $user->myFriends();
        return view('pages/connections/my-friends', compact('user', 'friends'));
    }
    public function myFriendRequestsIndex()
    {
        $user = Auth::user();
        $friendRequests = Auth::user()->followedByRequestedUsers;
        return view('pages/connections/my-friend-requests', compact('friendRequests', 'user'));
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
