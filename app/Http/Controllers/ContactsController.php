<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Contact;
use App\Models\Sms;
use App\Utility\PhoneNumberUtility;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use app\Mail\InviteEmail;


class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('pages/contact', compact('contacts'));
    }

    public function testInvite($contact_id)
    {
        $contact = Contact::where('id', $contact_id)->where('user_sid', Auth::id())->where('source', 'email')->first();
        Mail::to($contact->source_id)->send(new InviteEmail(Auth::user()));
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
        Connection::create([
            'following_id' => Auth::id(),
            'followed_id' => $user_id,
            'created_by' => 'contacts',
            'nickname' => $request->nickname,
        ]);
        session()->flash('message.success',
            'درخواست دوستی ارسال شد.'
        );
        return redirect()->back();
    }

    public function invite($contact_id)
    {
        $contact = Contact::where('id', $contact_id)->where('user_id', Auth::id())->where('source', 'gsm')->first();

        Sms::invite(Auth::user(), $contact->source_id);

        session()->flash('message.success',
            'دعوت برای '
            . $contact->name .
            'ارسال شد'
        );
        return redirect()->back();
    }
}
