<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

function storeFile($req, $name, $path)
{
    if ($req->file($name)) {
        $file = $req->file($name);
        $filepath = $file->move(public_path() . $path, $file->getClientOriginalName());
        return url($path . $filepath->getFilename());
    }
    return null;
}
function success($message, $data = null)
{
    return response(
        [
            "msg" => $message,
            "data" => $data,
            "code" => config('statuscode.success')
        ],
        200
    );
}
function created($message, $data = null)
{
    return response(
        [
            "msg" => $message,
            "data" => $data,
            "code" => config('statuscode.created')
        ],
        200
    );
}
function badrequest($message, $error = null)
{
    return response(
        [
            "msg" => $message,
            "error" => $error,
            "code" => config('statuscode.bad_request')
        ],
        200
    );
}
function unAuthorized($message, $data = null)
{
    return response(
        [
            "msg" => $message,
            "code" => config('statuscode.unauthorized')
        ],
        401
    );
}
function internalServerError($message)
{
    return response(
        [
            "msg" => $message,
            "code" => config('statuscode.internal_server_error')
        ],
        200
    );
}
function unValidate($validation)
{
    return response(
        [
            "validationError" => $validation,
            "code" => config('statuscode.unValidate')
        ],
        200
    );
}

function __send($msg)
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
        Log::info('Success Send Msg' . $response->body());
        return $response;
    } else {
        Log::error('Error Send Msg' . $response->body());
        return $response;
    }
}

function send($msg)
{
    $responce = __send($msg);
    if ($responce->successful()) {
        Log::info("Successfully Send message", $responce->json());
        return $responce->body();
    } else {
        Log::error('error while sending message', $responce->json());
        return $responce->body();
    }
}
