<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class costomer extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('costomerScope', function (Builder $builder) {
            $builder->with('zone');
        });
    }

    protected $fillable = [
        'name',
        'phone_no',
        'email',
        'password',
        'compunys_name',
        'compunys_logo',
        'social_link',
        'social_link',
        'address',
        'state',
        'country',
        'email_veryfi',
        'phone_veryfi',
        'status',
        'pricing_formate',
        'approved',
        'zone',
        'token',
        'avtar',
        'otp',
        'discount'
    ];

    public function zone()
    {
        return $this->hasOne(countryzone::class, 'id', 'zone');
    }
}
