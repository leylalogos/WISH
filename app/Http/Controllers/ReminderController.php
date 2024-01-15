<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\ReminderChannel;
use Auth;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function store(Request $request)
    {
        foreach ([1, 3, 14, 60] as $in_advance) {
            if ($request->$in_advance) { //checked
                Reminder::firstOrCreate([
                    'user_id' => Auth::id(),
                    'in_advance' => $in_advance,
                ]);

            } else { //unchecked
                $exist = Reminder::where('user_id', Auth::id())->where('in_advance', $in_advance)->first();
                if ($exist) {
                    $exist->delete();
                }
            }
        }
        ReminderChannel::updateOrCreate(
            ['user_id' => Auth::id()],
            ['email' => $request->has('email'), 'browser' => $request->has('browser')]);
        return redirect()->back();

    }
}
