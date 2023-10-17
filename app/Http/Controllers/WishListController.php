<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishList;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            'priority' => 'required|integer|min:0|max:3',
        ]);

        try {
            $response = Http::get($request->url);
        } catch (\Exception $e) {
            return back()->withErrors(['url' => 'در حال حاضر امکان بررسی لینک مورد نظر وجود ندارد.']);
        }
        if ($response->status() != 200) {
            return back()->withErrors(['url' => 'لینک مورد نظر وجود ندارد.']);

        }
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
