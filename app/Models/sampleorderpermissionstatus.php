<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class sampleorderpermissionstatus extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('sampleorderScop', function (Builder $builder) {
            $builder->with(['product', 'orders']);
        });
    }

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'products_id')->withoutGlobalScope('orientationScope');
    }

    public function orders()
    {
        return $this->hasOne(order::class, 'id', 'orders_id')->withoutGlobalScope('orderScope');
    }

}
