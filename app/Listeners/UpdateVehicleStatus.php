<?php

namespace App\Listeners;

use App\Events\VehicleBooked;
use App\Models\Vehicle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateVehicleStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VehicleBooked $event)
    {
        $event->vehicle->update(['available'=>Vehicle::AVAILABLE]);
        return;
    }
}
