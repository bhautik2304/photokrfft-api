<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productSize extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('sizeScope', function (Builder $builder) {
            $builder->with(['size', 'papers', 'cover', 'boxsleeve', 'sheet',]);
        });
        static::addGlobalScope('orderSizeScope', function (Builder $builder) {
            $builder->with(['size']);
        });
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    public function cover()
    {
        return $this->hasMany(productcovers::class);
    }

    public function boxsleeve()
    {
        return $this->hasMany(productboxsleeve::class);
    }

    public function sheet()
    {
        return $this->hasMany(productsheet::class);
    }

    public function papers()
    {
        return $this->hasMany(productpaper::class);
    }
}
