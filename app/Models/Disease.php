<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function covid_effect()
    {
       return $this->hasMany(Covideffect::class, 'previous_disease', 'id');
    }
}

