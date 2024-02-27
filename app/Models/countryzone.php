<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countryzone extends Model
{
    use HasFactory;

    protected $fillable  = [
        'zonename',
        'shipingcharge',
        'currency_sign',
        'img',
    ];
}
