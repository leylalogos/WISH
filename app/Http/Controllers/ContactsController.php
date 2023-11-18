<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Auth;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('pages/contact', compact('contacts'));
    }

    public function fetch(Request $request)
    {
        foreach ($request->contacts as $contact) {
            $name = isset($contact['name']) ? implode(' ', $contact['name']) : '-';
            if (isset($contact['tel'])) {
                foreach ($contact['tel'] as $tel) {
                    //create wish contact
                    Contact::create([
                        'name' => $name,
                        'user_id' => Auth::id(),
                        'source' => 'gsm',
                        'source_id' => $tel,
                    ]);
                }
            }
            if (isset($contact['email'])) {
                foreach ($contact['email'] as $email) {
                    //create wish contact
                    Contact::create([
                        'name' => $name,
                        'user_id' => Auth::id(),
                        'source' => 'email',
                        'source_id' => $email,
                    ]);
                }
            }

        }
        session()->flash(
            'message.success',
            'مخاطبین با موفقیت اضافه شدند.'
        );
        return ['message' => "Success"];
    }
}
