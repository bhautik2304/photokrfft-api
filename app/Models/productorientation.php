<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class productorientation extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('orientationScope', function (Builder $builder) {
            $builder->with(['size', 'orientation']);
        });
        static::addGlobalScope('orderScope', function (Builder $builder) {
            $builder->with(['orientation']);
        });
    }

    public function size()
    {
        return $this->hasMany(productSize::class);
    }

    public function orientation()
    {
        return $this->hasOne(orientation::class, 'id', 'orientation_id');
    }
}
