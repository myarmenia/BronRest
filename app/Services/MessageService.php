<?php

namespace App\Services;


class MessageService
{

     /**
     * Send SMS Message.
     * @param String $sendTo
     * @param String $message
     * @return String
     */
    public function sendSMS(string $sendTo, string $message):String
    {

     $url = 'http://gateway.api.sc/get/?user='. env('STREAM_TEL_LOGIN') . '&pwd='.env('STREAM_TEL_PASS').'&sadr='.env('STREAM_TEL_SADR').'&dadr='.$sendTo.'&text=' . $message;  
     $var = file_get_contents($url);
     return $var;
    }
}
