<?php

namespace App\Utility;

class SendGridUtil{

public static function sendEmail(string $from, string $subject,string $to, string $content){
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("$from@wish.xnor.one", "Wish $from");
	$email->setSubject($subject);
	$email->addTo($to, $to);
	$email->addContent("text/plain", $content);
	$sendgrid = new \SendGrid(config('mail.mailers.sendgrid.apikey'));
try {
    return $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}
}
