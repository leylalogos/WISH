<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \IPPanel\Client as IPPanelClient;

class Sms extends Model
{
    use HasFactory;

    public function sendOTP($phoneNumber, $code)
    {
        return self::sendSMS($phoneNumber,
            " کد تایید ورود شما: $code"
        );
    }

    /**
     * @param User $inviter
     */
    public static function invite(User $inviter, $inviteePhoneNumber)
    {
        $inviterName = $inviter->name;
        $link = route('invite', ['username' => $inviter->username]);
        return self::sendSMS($inviteePhoneNumber,
            "دوست شما $inviterName از شما درخواست دنبال کردن ایشان در سایت: $link را دارد."
        );

    }

    private static function sendSMS($recepientPhoneNumber, $message)
    {
        $panel = new IPPanelClient(config('services.modir_sms.password'));
        $messageId = $panel->send(
            config('services.modir_sms.number'), // originator
            [$recepientPhoneNumber], // recipients
            $message, // message
            "" // is logged
        );
        return $messageId;
    }
}
