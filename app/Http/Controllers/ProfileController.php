<?php

namespace App\Http\Controllers;

use App\Models\Connection;
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
        $viewAccess = ((bool) Connection::getConnectionBetween(Auth::id(), $user_id)) || (Auth::id() == $user_id);

        $anniversaries = $section == 'event' ? $user->anniversaries : null;
        $wishLists = $section == 'wishList' ? $user->wishLists : null;

        return view("pages/profile/$section", compact('user', 'anniversaries', 'wishLists', 'viewAccess'));
    }
}
