<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $followed_user_ids = $user->followingConfirmedUsers->pluck('id');
        $events = Event::whereIn('user_id', $followed_user_ids)
            ->orderBy('date', 'asc')
            ->where('date', '>', now())
            ->where('date', '<', Carbon::now()->addMonth(6))
            ->get();
        return view('pages/homePage', compact('user', 'events'));
    }
}
