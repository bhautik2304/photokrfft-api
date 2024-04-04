<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class countryzone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable  = [
        'zonename',
        'shipingcharge',
        'currency_sign',
        'img',
    ];
}
