@extends('layouts.app')
@section('section')
<div class="p-4 flex justify-center">
<!-- This is an example component -->
    <div class="rounded-xl border p-5 shadow-md w-1/2 bg-white">
        <div class="flex w-full items-center justify-between border-b pb-3">
            <div class="flex items-center space-x-3">
                {{-- <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div> --}}
                <div class="text-lg font-bold text-slate-700">
                    <h1 class="text-xl uppercase text-blue-500 py-4">
                        Update Vehicle Detail
                    </h1>

                </div>
            </div>
            <div class="flex items-center space-x-8">
                <a href="{{route('vehicle.index')}}" class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">All Vehicle</a>
            </div>
        </div>

        <div class="mt-4 mb-6">
            
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('vehicle.update',$vehicle) }}">
                        @method('put')
                        @csrf
            
                        <!-- Model Details -->
                        <div>
                            <x-label for="model" :value="__('Model')" />
            
                            <x-input id="model" class="block mt-1 w-full" type="text" name="model" value="{{$vehicle->model}}" required
                                autofocus />
                        </div>

                        <!-- Number Details -->
                        <div>
                            <x-label for="number" :value="__('Number')" />
            
                            <x-input id="number" class="block mt-1 w-full" type="text" name="number" value="{{$vehicle->number}}" required
                                 />
                        </div>
                        <!-- Number Details -->
                        <div>
                            <x-label for="rent_per_day" :value="__('Rent Per Day')" />
            
                            <x-input id="rent_per_day" class="block mt-1 w-full" type="number" name="rent_per_day" value="{{$vehicle->rent_per_day}}" required
                                 />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">            
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
        </div>

</div>
</div>
@endsection