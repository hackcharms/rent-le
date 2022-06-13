@extends('layouts.app')
@section('section')
<h1 class="text-xl p-2 py-4">
    show Vehicle
</h1>
<div class="py-4 flex justify-center">
    <!-- This is an example component -->
    <div class="rounded-xl border p-5 shadow-md w-full bg-white">
        <div class="flex w-full items-center justify-between border-b pb-3">
            <div class="flex items-center space-x-3">
                {{-- <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div> --}}
                <div class="text-lg font-bold text-slate-700">
                    <h1 class="text-xl uppercase text-blue-500 py-4">
                        Add Vehicle
                    </h1>

                </div>
            </div>
            <div class="flex items-center space-x-8">
            @can('update',$vehicle)
                <a href="{{route('vehicle.edit',$vehicle)}}"
                    class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Edit Details</a>
            @endcan
                <a href="{{route('vehicle.index')}}"
                    class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">All Vehicles</a>
            </div>
        </div>

        <div class="mt-4 mb-6">
            <div class="w-full lg:flex">
                <div
                    class="w-full bg-white p-4 flex flex-col justify-between leading-normal">

                    <div class="mb-8 w-full">
                        <form action="{{route('order.store',$vehicle)}}" method="POST">
                            @csrf
                            <table class="w-full text-sm md:text-lx">
                                <tbody>
                                    <tr>
                                        <td class="py-4">Model</td>
                                        <td>{{$vehicle->model}}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4">Number</td>
                                        <td>{{$vehicle->number}}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-4">Charge/Day</td>
                                        <td>{{$vehicle->rent_per_day}}</td>
                                    </tr>
                                    {{-- <tr class="hidden md:table-row">
                                        <td class="py-4">
                                            <div class="flex">
                                                <span
                                                    class="text-sm border-2 rounded-l-lg px-4 py-2 bg-gray-300 whitespace-no-wrap">Days<sup>*</sup>
                                                    :</span>
                                                <div>
                                                    <input name="days"  value="{{old('days')}}" class="border-2 rounded-r-lg px-4 py-2 w-full
                                            @error('days')
                                                border-red-500
                                            @enderror
                                            " type="number" placeholder="Number of Days" min="1" />
                                                </div>
                                            </div>
                                            <p class="text-red-400">
                                                @error('days')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </td>
                                        <td>
                                            <x-button-buy-now
                                            >
                                            Book Now
                                            </x-button-buy-now>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            @can('create',App\Models\Order::class)
                            @if ($vehicle->available)
                            <div class="md:flex">
                                <div class="w-full md:w-1/2">
                                    <div class="flex justify-center md:justify-start">
                                        <span
                                            class="text-sm border-2 rounded-l-lg px-4 py-2 bg-gray-300 whitespace-no-wrap">Days<sup>*</sup>:
                                        </span>
                                        <div>
                                            <input name="days" value="{{old('days')}}" class="border-2 rounded-r-lg px-4 py-2 w-full
                                            @error('days')
                                                border-red-500
                                            @enderror
                                            " type="number" placeholder="Number of Days" min="1" />
                                        </div>
                                    </div>
                                    <p class="text-red-400">
                                        @error('days')
                                        {{$message}}
                                        @enderror
                                    </p>

                                </div>
                                <div class="w-full md:w-1/2 flex justify-center items-center md:justify-start my-4">
                                    <x-button-buy-now>
                                    Book Now
                                    </x-button-buy-now>
                                </div>
                            </div>
                            @else
                                <p class=" text-center text-red-400">
                                    This Vehicle is already Booked.
                                </p>
                            @endif
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="py-8">
        <div class="flex w-full items-center justify-between border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <div class="text-lg font-bold text-slate-700">
                            <h1 class="text-xl uppercase text-blue-500 py-4">
                                {{$label??'Orders'}}
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-8">
                        <a href="{{route('order.index',$vehicle)}}"
                            class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">All Orders</a>
                        {{-- <a href="{{route('vehicle.index')}}"
                            class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">All Vehicles</a> --}}
                    </div>
                </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                User Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Vehicle Modal
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Expires at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vehicle->orders as $order)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{$order->user->name}}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="" class="text-gray-900 whitespace-no-wrap">{{$order->vehicle->model}}</a>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$order->created_at}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$order->rent_expired_at}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if ($order->rent_expired_at->greaterThan(now()))
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Activo</span>
                                </span>
                                @else
                                <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Expired</span>
                                </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%">
                                No data found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection