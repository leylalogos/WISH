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
        return view('pages.wish-list');
    }

    public function create(User $user, Request $request)
    {
        $user = Auth::user();

        WishList::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'url' => $request->url,
            'priority' => $request->priority,
        ]);
        return redirect()->back();
    }

    public function show()
    {
        $wishLists = Auth::user()->wishLists;
        return view('pages.my-wish-list', compact('wishLists'));
    }
}
