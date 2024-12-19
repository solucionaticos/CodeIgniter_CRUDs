<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACc2b62d61a58f44365e431bcda684007a';
$token = '5e54573ea6c9f494145c041242cc348a';
$client = new Client($sid, $token);
// $twilio_phone_number = 'whatsapp:+18622175413'; // SMS
$twilio_phone_number = 'whatsapp:+14155238886'; // WhatsApp

// Use the client to do fun stuff like send text messages!

// $whatsapp_client = 'whatsapp:+573164176666';
$whatsapp_client = 'whatsapp:+573144590463';
// $whatsapp_client = 'whatsapp:+573041031256';
// $whatsapp_client = 'whatsapp:+573232894094';

$body = 'Hola, esta es una prueba';

$message = $client->messages->create(
    // the number you'd like to send the message to
    $whatsapp_client,
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => $twilio_phone_number,
        // the body of the text message you'd like to send
        'body' => $body
    ]
);

echo "whatsapp_client -> $whatsapp_client <hr>";

echo "message->sid: ";
print($message->sid);

/*

twilio
-----------
https://www.twilio.com/docs/sms
https://www.twilio.com/docs/whatsapp

Contraseña: Twilio ---> kilokilokilokilokilo

Congratulations! You're all set up.
Use this information to replace variables in your code.
Account Information
Account SID
ACc2b62d61a58f44365e431bcda684007a
Auth Token

Hide Auth Token
5e54573ea6c9f494145c041242cc348a

Twilio Phone Number: +18622175413


*/

