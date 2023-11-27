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
        $panel = new IPPanelClient(config('services.modir_sms.password'));

        // dd($phoneNumber);
        $messageId = $panel->send(
            config('services.modir_sms.number'), // originator
            [$phoneNumber], // recipients
            "hello leyla $code", // message
            "" // is logged
        );
        return $messageId;

    }
}
