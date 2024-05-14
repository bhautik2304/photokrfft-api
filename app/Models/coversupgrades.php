<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder, SoftDeletes};

class coversupgrades extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted(): void
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->with('coversupgradecolors');
        });
    }

    protected $fillable = [
        'name',
        'cover_id',
        'img',
        'status',
    ];

    public function coversupgradecolors()
    {
        return $this->hasMany(coversupgradecolor::class, 'coversupgrade_id');
    }
}
