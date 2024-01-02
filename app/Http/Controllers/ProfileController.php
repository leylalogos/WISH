<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($user_id, $section = 'event')
    {
        if (!in_array($section, ['event', 'basicInformation', 'wishList'])) {
            abort(400);
        }
        $user = User::findOrFail($user_id);
        $anniversaries = Auth::user()->anniversaries;
        $wishLists = Auth::user()->wishLists;

        return view("pages/profile/$section", compact('user', 'anniversaries', 'wishLists'));
    }
}
