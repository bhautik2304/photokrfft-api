<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class sheet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'img',
        'status',
    ];
}
