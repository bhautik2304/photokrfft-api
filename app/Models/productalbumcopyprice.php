<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model,Builder};

class productalbumcopyprice extends Model
{
    use HasFactory;

    protected $fillable=['price'];

    protected static function booted(): void
    {
        static::addGlobalScope('orientationScope', function (Builder $builder) {
            $builder->with(['zone']);
        });
    }

    public function zone (){
        return $this->belongsTo(countryzone::class,'countryzone_id');
    }
}
