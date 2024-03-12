<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class printingprice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'countryzone_id',
        'price',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('printingpricescop', function (Builder $builder) {
            $builder->with(['zone']);
        });
    }

    public function zone()
    {
        return $this->belongsTo(countryzone::class, 'countryzone_id');
    }
}