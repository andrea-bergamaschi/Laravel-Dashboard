<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymService extends Model
{
    use HasFactory;

    protected $table = 'gyms_services';

    protected $fillabe = [
        'gym_id',
        'service_id',
    ];

}
