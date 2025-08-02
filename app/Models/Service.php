<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    protected $fillable = [
        'installed_kwh',
        'vehicle_devices',
        'auto_eoms',
        'experience_year',
    ];
}
