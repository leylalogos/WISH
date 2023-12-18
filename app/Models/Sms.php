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
        return self::sendByPattern($phoneNumber, "hucv3rmhhyg42ob", ["verification-code" => $code]);
    }

    /**
     * @param User $inviter
     */
    public static function invite(User $inviter, $inviteePhoneNumber)
    {
        $inviterName = $inviter->name;
        $link = route('invite', ['username' => $inviter->username]);
        return self::sendByPattern($inviteePhoneNumber, "zox2vryx12dghx2", [
            "inviter" => $inviterName,
            "invite-link" => $link,
        ]);
    }
    private static function sendByPattern($phoneNumber, $patternCode, $patternValues)
    {
        $client = new IPPanelClient(config('services.modir_sms.password'));

        return $client->sendPattern(
            $patternCode, // pattern code
            config('services.modir_sms.number'), // originator
            $phoneNumber, // recipient
            $patternValues, // pattern values
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
