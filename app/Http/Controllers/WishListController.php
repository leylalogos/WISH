<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishList;
use Auth;
use Illuminate\Http\Request;

class WishListController extends Controller
{

    public function index()
    {
        $wishLists = Auth::user()->wishLists;
        return view('pages.my-wish-list', compact('wishLists'));
    }
    public function create(User $user, Request $request)
    {
        $request->validate([
            'title' => 'string|min:2|max:255',
            'url' => 'url',
            'priority' => 'integer|min:0|max:3',
        ]);
        $user = Auth::user();
        WishList::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'url' => $request->url,
            'priority' => $request->priority,
        ]);
        return redirect()->back();
    }

}
