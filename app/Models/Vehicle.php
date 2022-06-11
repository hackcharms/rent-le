<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'vehicle_id');
    }


}
