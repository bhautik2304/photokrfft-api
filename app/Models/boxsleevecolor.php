<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class boxsleevecolor extends Model
{
    use HasFactory;
    protected static function booted(): void
    {
        static::addGlobalScope('coversupgradecolor', function (Builder $builder) {
            $builder->with('colors');
        });
    }


    public function colors()
    {
        return $this->belongsTo(color::class, 'color_id');
    }
}
