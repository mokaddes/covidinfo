<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table        = 'web_settings';
    protected $primaryKey   = 'id';
    public $timestamps      = false;

    use HasFactory;
    protected $fillable = [
        'app_name',
        'logo',
        'favicon',
        'keywords',
        'description',
        'footer'
    ];
}
