<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class VehicleFeatureTest extends TestCase
{
    protected $user;
    protected $company;
    protected $company1;
    protected $vehicle;
    public function setUp():void
    {
        $user=User::factory()->make();
        $user->type=User::TYPE_USER;
        $user->save();
        $this->user=$user;
        $company=User::factory()->make();
        $company->type=User::TYPE_COMPANY;
        $company->save();
        $this->company=$company;
        // $vehicle=$this->company->vehicle()->make(Vehicle::factory()->make());
        // $vehicle->save();
        // $this->vehicle=$vehicle;
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_user_can_access_vehicle_index_page()
    {
        $response = $this->get(route('vehicle.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_guest_user_can_access_vehicle_details_page(){
        $response = $this->get(route('vehicle.show',$this->vehicle));
        $response->assertStatus(Response::HTTP_OK);
    }
    public function test_user_can_not_access_create_vehicle_page(){
        $response = $this->actingAs($this->user)->get(route('vehicle.create'));
        $response->assertStatus(Response::HTTP_FOUND);
    }
}
