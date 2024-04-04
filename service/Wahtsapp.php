<?php

namespace App\Service;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class Wahtsapp
{
    private function __send($msg)
    {
        $token = config("whatsapp.token");
        $whatsapp_no_id = config("whatsapp.whatsapp_no_id");
        $version = config("whatsapp.v");
        $apiUrl = "https://graph.facebook.com/$version/$whatsapp_no_id/messages";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($apiUrl, $msg);
        if ($response->successful()) {
            Log::info('Send Msg' . $response->body());
            return $response;
        } else {
            Log::error('Send Msg' . $response->body());
            return $response;
        }
    }

    public function send($msg)
    {
        $responce = $this->__send($msg);
        if ($responce->successful()) {
            Log::channel('whatsappSend')->info("", $responce->json());
            return $responce->body();
        } else {
            Log::channel('whatsappSend')->info('', $responce->json());
            return $responce->body();
        }
    }
}
