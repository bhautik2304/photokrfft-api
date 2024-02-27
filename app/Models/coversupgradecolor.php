<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class coversupgradecolor extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('coversupgradecolor', function (Builder $builder) {
            $builder->with('colors');
        });
    }

    protected $fillable = [
        'coversupgrade_id',
        'color_id',
    ];

    public function colors()
    {
        return $this->belongsTo(color::class, 'color_id');
    }
}
