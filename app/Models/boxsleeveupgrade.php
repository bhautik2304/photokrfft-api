<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class boxsleeveupgrade extends Model
{


    protected $fillable = [
        "name",
        "img",
    ];

    use HasFactory;
    protected static function booted(): void
    {
        static::addGlobalScope('boxandsleeveUpgradeScop', function (Builder $builder) {
            $builder->with('boxsleeveupgradecolor');
        });
    }
    public function boxsleeveupgradecolor()
    {
        return $this->hasMany(boxsleevecolor::class, 'boxsleeveupgrade_id');
    }
}
