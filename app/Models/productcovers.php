<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productcovers extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('sheetscop', function (Builder $builder) {
            $builder->with('cover', 'coverprice');
        });
        static::addGlobalScope('orderCoverScop', function (Builder $builder) {
            $builder->with('cover');
        });
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function cover()
    {
        return $this->belongsTo(covers::class, 'cover_id');
    }

    public function coverprice()
    {
        return $this->hasMany(productcoverprice::class, 'productcover_id', 'id');
    }
}
