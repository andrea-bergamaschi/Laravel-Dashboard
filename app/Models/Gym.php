<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $table = 'gyms';

    protected $fillable = [
        'name',
        'city',
        'region',
    ];

    public function service(){
        return $this->belongsToMany(Service::class, 'gyms_services', 'gym_id', 'service_id');
        
    }
}
