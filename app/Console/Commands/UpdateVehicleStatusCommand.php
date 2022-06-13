<?php

namespace App\Console\Commands;

use App\Jobs\UpdateVehicleStatus;
use App\Models\Vehicle;
use Illuminate\Console\Command;

class UpdateVehicleStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent-le:update-vehicle-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Vehicle Availability Status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UpdateVehicleStatus::dispatch();
    }
}
