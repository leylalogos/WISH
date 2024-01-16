<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomePageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $followed_user_ids = $user->followingConfirmedUsers->pluck('id');

        $events = Cache::remember(
            User::CACHE_KEY_FRIENDS_EVENT . $user->id, 86400,
            function () use ($followed_user_ids, $user) {
                return Event::usersEventsInRange($followed_user_ids, now(), Carbon::now()->addMonth(6));

            });
        return view('pages/homePage', compact('user', 'events'));

    }
}
