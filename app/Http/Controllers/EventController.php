<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Auth::user()->events()->orderBy('date', 'asc')->get();
        return view('pages/anniversary-event/event', compact('events'));
    }
    public function store(Event $event, EventRequest $request)
    {
        Event::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'title' => $request->title,
            'importance' => $request->importance,
            'description' => $request->description,
            'origin' => Event::ORIGIN_USER,
        ]
        );
        session()->flash(
            'message.success',
            'مراسم اضافه شد'
        );
        return redirect()->back();
    }
    public function update(Event $event, EventRequest $request)
    {
        $event->where('id', $event->id)->update(
            $request->except(['user_id', '_token']),
        );
        session()->flash(
            'message.success',
            'مراسم ویرایش شد'
        );
        return redirect()->back();
    }

    public function destroy(Event $event, Request $request)
    {
        $event->where('id', $event->id)->delete();
        session()->flash(
            'message.success',
            'اطلاعات با موفقیت حذف شد.'
        );

        return redirect()->back();
    }
}
