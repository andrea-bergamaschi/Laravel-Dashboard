<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'service_name',
        'type',
    ];

    public function gym(){
        return $this->belongsToMany(Gym::class, 'gyms_services', 'service_id', 'gym_id');
        
    }

}
