<?php

function storeFile($req, $name, $path)
{
    if ($req->file($name)) {
        $file = $req->file($name);
        $filepath = $file->move(public_path() . $path, $file->getClientOriginalName());
        return url($path . $filepath->getFilename());
    }
    return null;
}
function success($message, $data=null)
{
    return response(
        [
            "msg"=>$message,
            "data"=>$data,
            "code"=>config('statuscode.success')
        ],
        200
    );
}
function created($message, $data=null)
{
    return response(
        [
            "msg"=>$message,
            "data"=>$data,
            "code"=>config('statuscode.created')
        ],
        200
    );
}
function badrequest($message, $error=null)
{
    return response(
        [
            "msg"=>$message,
            "error"=>$error,
            "code"=>config('statuscode.bad_request')
        ],
        200
    );
}
function unAuthorized($message, $data=null)
{
    return response(
        [
            "msg"=>$message,
            "code"=>config('statuscode.unauthorized')
        ],
        200
    );
}
function internalServerError($message)
{
    return response(
        [
            "msg"=>$message,
            "code"=>config('statuscode.internal_server_error')
        ],
        200
    );
}
function unValidate($validation)
{
    return response(
        [
            "validationError"=>$validation,
            "code"=>config('statuscode.unValidate')
        ],
        200
    );
}
