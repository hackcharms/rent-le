<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $casts=[
        "rent_expired_at"=>"datetime"
    ];
    public function vehicle(){
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
