<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::user()->limit(10)->get();
        $vehicles=Vehicle::available()->limit(10)->get();
        $vehicles->each(function($vehicle)use($users){
            return $vehicle->orders()->make([
                "user_id"=>$users
                ->random()->id,
                'rent_expired_at'=>now()->addDays(rand(1,20))->addHours(rand(1,20))
            ])->save();
        });
    }
}
