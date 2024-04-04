<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class customer extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('costomerScope', function (Builder $builder) {
            $builder->with('zone', 'sampleOrders');
        });
    }

    protected $fillable = [
        'name',
        'country_code',
        'phone_no',
        'whatsapp_no',
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
        'whatsapp_veryfi',
        'status',
        'pricing_formate',
        'approved',
        'zone',
        'token',
        'avtar',
        'otp',
        'discount',
        'access_token',
    ];

    public function zone()
    {
        return $this->hasOne(countryzone::class, 'id', 'zone');
    }
    public function sampleOrders()
    {
        return $this->hasMany(sampleorderpermissionstatus::class, 'customers_id', 'id');
    }
}
