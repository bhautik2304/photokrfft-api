<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productpaper extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('paperscop', function (Builder $builder) {
            $builder->with(['paper']);
        });
    }

    public function size()
    {
        return $this->belongsTo(productSize::class, 'product_size_id');
    }

    public function paper()
    {
        return $this->hasOne(paper::class, 'id', 'paper_id');
    }
}
