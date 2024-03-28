<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder, SoftDeletes};

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted(): void
    {
        static::addGlobalScope('orientationScope', function (Builder $builder) {
            $builder->with(['albumCopyPrice', 'orientation', 'pritnigPrice']);
        });
    }

    protected $fillable = [
        'name',
        'img',
        'min_page'
    ];

    public function orientation()
    {
        return $this->hasMany(productorientation::class, 'product_id');
    }
    public function albumCopyPrice()
    {
        return $this->hasMany(productalbumcopyprice::class, 'product_id');
    }
    public function pritnigPrice()
    {
        return $this->hasMany(printingprice::class, 'product_id');
    }
}
