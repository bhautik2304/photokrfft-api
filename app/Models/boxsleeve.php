<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder, SoftDeletes};

class boxsleeve extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted(): void
    {
        static::addGlobalScope('hhhfg', function (Builder $builder) {
            $builder->with('boxsleeveupgrades');
        });
    }

    protected $fillable = [
        'name',
        'img',
        'type',
        'status',
    ];

    public function boxsleeveupgrades()
    {
        return $this->hasMany(boxsleeveupgrade::class, 'boxsleeve_id');
    }
}
