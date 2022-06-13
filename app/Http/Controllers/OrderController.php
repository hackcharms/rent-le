<?php

namespace App\Http\Controllers;

use App\Events\VehicleBooked;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the Orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Order::class);
        $orders=\Auth::user()->orders()->with(['user','vehicle'])->paginate(20);
        $label="Your Orders";
        return view('order.index',compact('orders','label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Vehicle $vehicle,StoreOrderRequest $request)
    {
        $this->authorize('store', [Order::class,$vehicle]);
        $user=Auth::user();
        $order=$user->orders()->make();
        $order->rent_expired_at=now()->addDays($request->validated('days'));
        $order->vehicle_id=$vehicle->id;
        $order->save();
        $vehicle->available=Vehicle::TAKEN;
        $vehicle->save();
        // Dispatch the event if any other operation needs to perform.
        VehicleBooked::dispatch($vehicle);        
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('show', $order);
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->authorize('edit', $order);
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $this->authorize('update', $order);
        $order->forceFill($request->validated());
        $order->save();
        return view('order.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $this->authorize('destroy', $order);
        $order->delete();
        return redirect()->route('order.index');
    }
}
