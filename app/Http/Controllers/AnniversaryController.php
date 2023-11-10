<?php

namespace App\Http\Controllers;

use App\Models\Anniversary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnniversaryController extends Controller
{
    public function index()
    {
        $anniversaries = Auth::user()->anniversaries;
        return view('pages/anniversary', compact('anniversaries'));
    }

    public function store(Anniversary $anniversay, Request $request)
    {
        Anniversary::create([
            'user_id' => Auth::id(),
            'anniversary_date' => $request->anniversary_date,
            'anniversary_type' => $request->anniversary_type,
            'importance' => $request->importance,
            'description' => $request->description,
        ]);
        return back();
        session()->flash(
            'message.success',
            'مراسم اضافه شد'
        );
    }

    public function update(Anniversary $anniversay, Request $request)
    {

        Anniversary::where('id', $anniversary->id)->update(
            $request->except(['user_id']),
        );
    }
}
