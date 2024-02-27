<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminuser extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone_no",
        "profile_photo",
        "email",
        "password",
    ];
}
