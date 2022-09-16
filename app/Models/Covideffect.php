<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covideffect extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'on_behalf',
        'on_behalf_relation',
        'recipient_name',
        'age',
        'gender',
        'profession',
        'nation',
        'vaccine_type',
        'vaccine_date',
        'vaccine_location',
        'vaccine_batch',
        'complaints',
        'symptoms',
        'covid_side_effect_id',
        'other_effect',
        'affect_quality',
        'hospitalized',
        'ward_type',
        'hospitalized_duration',
        'hospital_name',
        'effect_duration',
        'present_status',
        'previous_disease',
        'diagnosis',
        'effect_confirm',
        'report',
        'npra',
        'contact',
        'comments',
        'file'

    ];




    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function covid_side_effect()
    {
        return $this->belongsTo(CovidSideEffect::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'previous_disease', 'id');
    }


}