<?php

namespace App\Http\Controllers;

use App\Models\ProfilePicture;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reminders = $user->reminders->pluck('in_advance')->all();
        return view('pages.user-account', compact('user', 'reminders'));
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
    public function storeProfileImage(Request $request)
    {
        $validated = $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg|max:5048']);
        $prev = ProfilePicture::where('user_id', Auth::id())->first();
        if ($prev) {
            Storage::delete($prev->file_path);
            $prev->delete();
        }
        $path = $request->image->storePublicly('public/profile-image');
        ProfilePicture::create([
            'user_id' => Auth::id(),
            'file_path' => $path,
            'mime' => $validated['image']->getMimeType(),
        ]);
        return redirect()->back();

    }
}
