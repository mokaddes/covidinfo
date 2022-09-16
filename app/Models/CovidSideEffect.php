<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidSideEffect extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'order_by'
    ];

    public function covid_effect()
    {
       return $this->hasMany(Covideffect::class);
    }
}
