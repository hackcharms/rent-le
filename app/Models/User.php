<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    const   TYPE_COMPANY=1,
            TYPE_USER=2;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeCompany($query){
        return $query->where('user_type',self::TYPE_COMPANY);
    }
    public function scopeUser($query){
        return $query->where('user_type',self::TYPE_USER);
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'id');
    }
    public function vehicles(){
        return $this->hasMany(Vehicle::class,'id');
    }
}
