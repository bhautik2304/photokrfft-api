<?php
// store file function
function storeFile($req, $name, $path)
{
    if ($req->file($name)) {
        $file = $req->file($name);
        $filepath = $file->move(public_path() . $path, $file->getClientOriginalName());
        return url($path . $filepath->getFilename());
        dd(url($path . $filepath->getFilename()));
    }

    return null;
}
