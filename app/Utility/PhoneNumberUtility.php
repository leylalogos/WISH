<?php
namespace App\Utility;

use \libphonenumber\PhoneNumberUtil;

class PhoneNumberUtility
{
    public static function convertToE164($phone_number)
    {

        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumberPrototype = $phoneUtil->parse($phone_number, "IR");
        if (!$phoneUtil->isValidNumber($phoneNumberPrototype)) {
            return null;
        }
        return $phoneUtil->format($phoneNumberPrototype, \libphonenumber\PhoneNumberFormat::E164);
    }
}
