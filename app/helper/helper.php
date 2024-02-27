<?php
// store file function
function storeFile($req, $name, $path)
{
    if ($req->file($name)) {
        $file = $req->file($name);
        $filepath = $file->move(public_path() . $path, $file->getClientOriginalName());

        // Log information for debugging
        \Log::info('File uploaded successfully: ' . $file->getClientOriginalName());

        return url($path . $filepath->getFilename());
    }

    // Log information for debugging
    \Log::info('File not uploaded.');

    return null;

}
