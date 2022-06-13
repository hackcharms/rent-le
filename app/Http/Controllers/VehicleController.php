<?php

namespace App\Http\Controllers;

use App\Events\VehicleBooked;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Requests\VehicleBookRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user();
        $vehicles=null;
        if(Auth::check()||$user->type==User::TYPE_COMPANY){
            $vehicles=$user->vehicles()->with('orders')->paginate(20);
        }else{
            $vehicles=Vehicle::available()->with('orders')->paginate(20);
        }
        return view('vehicle.index',compact(['vehicles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Vehicle::class);
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $this->authorize('create',Vehicle::class);
        $vehicle=new Vehicle();
        $vehicle->forceFill($request->validated());
        $vehicle->owner_id=Auth::user()->id;
        $vehicle->save();
        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update',$vehicle);
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $this->authorize('update',$vehicle);
        $vehicle->forceFill($request->validated());
        $vehicle->save();
        return view('vehicle.show',compact('vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $this->authorize('destroy',$vehicle);
        $vehicle->delete();
        return redirect()->route('vehicle.index');
    }

    // /**
    //  * Book Vehicles.
    //  *
    //  * @param  \App\Models\Vehicle  $vehicle
    //  * @return \Illuminate\Http\Response
    //  */
    // public function book(Vehicle $vehicle,VehicleBookRequest $request)
    // {
    //     $this->authorize('book',$vehicle);
    //     $user=Auth::user();
    //     $order=$user->orders()->make();
    //     $order->rent_expired_at=$request->validated('days');
    //     VehicleBooked::dispatch($vehicle);
    //     return redirect()->route('order.index');
    // }
}
