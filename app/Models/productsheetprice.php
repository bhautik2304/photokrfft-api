<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productsheetprice extends Model
{
    use HasFactory;

    protected $fillable = ['price'];

    protected static function booted(): void
    {
        static::addGlobalScope('currencyscop', function (Builder $builder) {
            $builder->with(['currency']);
        });
    }

    public function currency()
    {
        return $this->belongsTo(countryzone::class, 'countryzone_id', 'id');
    }
}
