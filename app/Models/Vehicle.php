<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    const   AVAILABLE=1,
            TAKEN=0;
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'vehicle_id');
    }


    public function scopeAvailable($query){
        return $query->where('available',self::AVAILABLE);
    }
    public function scopeTaken($query){
        return $query->where('available',self::TAKEN);
    }

    public function Number():Attribute
    {
        return Attribute::make(
            get:fn($value)=>$value,
            set:fn($value)=>strtoupper($value),
        );
    }
    public function Model():Attribute
    {
        return Attribute::make(
            get:fn($value)=>$value,
            set:fn($value)=>strtoupper($value),
        );
    }
    public function Image():Attribute
    {
        return Attribute::make(
            get:fn($value)=>$value??'/images/car'.rand(0,7).'.jpeg',
            // set:fn($value)=>strtoupper($value),
        );
    }

}
