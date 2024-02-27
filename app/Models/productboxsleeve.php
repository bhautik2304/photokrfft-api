<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productboxsleeve extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('cover', function (Builder $builder) {
            $builder->with(['boxsleeve', 'boxsleeveprice']);
        });
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function boxsleeve()
    {
        return $this->belongsTo(boxsleeve::class, 'boxsleeve_id');
    }

    public function boxsleeveprice()
    {
        return $this->hasMany(productboxsleeveprice::class);
    }
}
