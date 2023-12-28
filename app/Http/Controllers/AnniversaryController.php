<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnniversaryRequest;
use App\Models\Anniversary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnniversaryController extends Controller
{
    public function index()
    {
        $anniversaries = Auth::user()->anniversaries;
        return view('pages/anniversary-event/anniversary', compact('anniversaries'));
    }

    public function store(Anniversary $anniversay, AnniversaryRequest $request)
    {
        Anniversary::create([
            'user_id' => Auth::id(),
            'anniversary_date' => $request->anniversary_date,
            'anniversary_type' => $request->anniversary_type,
            'importance' => $request->importance,
            'description' => $request->description,
        ]
        );
        session()->flash(
            'message.success',
            'مراسم اضافه شد'
        );
        return redirect()->back();
    }

    public function update(Anniversary $anniversary, AnniversaryRequest $request)
    {

        $anniversary->where('id', $anniversary->id)->update(
            $request->except(['user_id', '_token']),
        );
        session()->flash(
            'message.success',
            'مراسم ویرایش شد'
        );
        return redirect()->back();
    }

    public function destroy(Anniversary $anniversary, Request $request)
    {
        $anniversary->where('id', $anniversary->id)->delete();
        session()->flash(
            'message.success',
            'اطلاعات با موفقیت حذف شد.'
        );

        return redirect()->back();
    }
}
