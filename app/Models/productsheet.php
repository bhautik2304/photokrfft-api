<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productsheet extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('sheetscop', function (Builder $builder) {
            $builder->with(['sheet', 'sheetprice']);
        });
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function sheet()
    {
        return $this->belongsTo(sheet::class, 'sheet_id');
    }

    public function sheetprice()
    {
        return $this->hasMany(productsheetprice::class);
    }
}
