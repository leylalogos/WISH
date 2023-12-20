<?php

namespace App\Http\Controllers;

use App\Mail\InviteEmail;
use App\Models\Contact;
use App\Models\Sms;
use App\Utility\PhoneNumberUtility;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    const EMAIL_REGEX = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/i';
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
                    $phone_number = PhoneNumberUtility::convertToE164($tel);
                    if ($phone_number != null) {
                        //create wish contact
                        Contact::create([
                            'name' => $name,
                            'user_id' => Auth::id(),
                            'source' => 'gsm',
                            'source_id' => PhoneNumberUtility::convertToE164($tel),
                        ]);
                    }

                }
            }
            if (isset($contact['email'])) {
                foreach ($contact['email'] as $email) {
                    if (preg_match(self::EMAIL_REGEX, $email)) {

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

        }
        session()->flash(
            'message.success',
            'مخاطبین با موفقیت اضافه شدند.'
        );
        return ['message' => "Success"];
    }

    public function create(Request $request)
    {
        $phone = PhoneNumberUtility::convertToE164($request->tel);
        if (is_null($phone)) {
            session()->flash(
                'message.error',
                'شماره تلفن اشتباه است .'
            );
            return redirect()->back();
        }
        Contact::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'source' => 'gsm',
            'source_id' => $phone,
        ]);
        session()->flash(
            'message.success',
            'مخاطبین با موفقیت اضافه شدند.'
        );
        return redirect()->back();
    }

    public function follow($user_id, Request $request)
    {
        Auth::user()->follow($user_id, 'contacts', $request->nickname);
        session()->flash('message.success',
            'درخواست دوستی ارسال شد.'
        );
        return redirect()->back();
    }

    public function invite($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        if ($contact->user_id != Auth::id()) {
            abort(403, 'This is not your contact');
        }

        switch ($contact->source) {
            case 'gsm':
                Sms::invite(Auth::user(), $contact->source_id);
                break;
            case 'email':
                Mail::to($contact->source_id)->send(new InviteEmail(Auth::user()));
        }

        session()->flash('message.success',
            'دعوت برای '
            . $contact->name .
            'ارسال شد'
        );
        return redirect()->back();
    }
}
