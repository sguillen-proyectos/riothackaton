<?php
class NotificationController extends BaseController
{
    public function sendSMS()
    {
        $sid = 'ACe446541e2622b554f0fd6067733773d6';
        $token = 'e8f2d19abef5b7f640663c2066e806e0';
        $from = '+17204770908';
        $to = '+59177549230';

        $message = 'Las puertas fueron abiertas!!!!';

        $client = new Services_Twilio($sid, $token);
        $message = $client
            ->account
            ->messages
            ->sendMessage($from, $to, $message);

        // return $message;
        return Response::json(['status' => 'ok'], 200);
    }
}
