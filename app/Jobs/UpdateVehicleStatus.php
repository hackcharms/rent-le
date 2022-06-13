<?php

namespace App\Jobs;

use App\Models\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateVehicleStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $vehicles=Vehicle::taken()->with('lastOrder')->get();
        if (!$vehicles->count()) {
            return 0;
        }
        $availableVehicles=$vehicles->filter(function($vehicle){
            if(!$vehicle->lastOrder){
                info("no order found updating avaiable",$vehicle->toArray());
                return true;
            }
            if($vehicle->lastOrder->rent_expired_at->lessThan(now())){
                info("Order had been expired", ["Vehicle"=>$vehicle,
            "lastOrder"=>$vehicle->lastOrder,
            "now"=>now()
            ]);
                return true;
            }
            info("order is active now",["Vehicle"=>$vehicle,
            "lastOrder"=>$vehicle->lastOrder,
            "now"=>now()
            ]);
            return false;
        });
        $expiredIds=$availableVehicles->map(fn($vh)=>$vh->id);
        if($expiredIds->count()){
            info($expiredIds->toArray());
            Vehicle::whereIn('id',$expiredIds->toArray())->update(['available'=>Vehicle::AVAILABLE]);
        }
        return 0;
    }
}
