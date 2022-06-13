@extends('layouts.app')
@section('section')
<div>
    <!-- Hero Section -->
    <section class="">
        <div
            class=" h-screen bg-cover bg-center flex justify-items-center items-center">
            <div class="px-10 lg:px-32 xl:px-40">
                <h1 class="text-6xl font-semibold font-serif mb-6">
                    <spian class="text-red-500">Big Sale 20% Off</spian> <br />
                    <span>On Every Car</span>
                </h1>
                <p class="text-lg max-w-md">Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat
                    hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto
                    veritatis delectus repellat modi impedit sequi.</p>
                <a href="{{route('vehicle.index')}}" class="inline-block mt-10 px-10 py-3 bg-red-500 text-lg text-white font-semibold">Rent Now</a>
            </div>
        </div>
    </section>
</div>
@endsection