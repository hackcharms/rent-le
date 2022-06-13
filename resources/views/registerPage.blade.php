@extends('layouts.app')
@section('section')
<div class="flex justify-center my-40 p-4">
    <section class="md:flex flex-wrap justify-around">
        <div class="bg-gray-100 border rounded-md shadow-md w-full mx-2 my-4  md:w-5/12 p-2 rounded-l-md ">
            <h1 class="text-xl upper">
                Register As Company
            </h1>
            <p class="mt-4 px-4">
                Lorem ipsum dolor, sit amet consectetur. Quasi explicabo dicta esse corporis eveniet?
            </p>
            <div class="flex justify-end p-4">
                <a href="{{route('register.company')}}" class="bg-blue-400 rounded-md px-4 py-2 text-white"> Register</a>
            </div>
        </div>
        <div class="bg-gray-100 border rounded-md shadow-md w-full mx-2 my-4  md:w-5/12 p-2 rounded-r-md">
            <h1 class="text-xl upper">
                Register As User
            </h1>
            <p class="mt-4 px-4">
                Lorem ipsum dolor, sit amet consectetur. Quasi explicabo dicta esse corporis eveniet?
            </p>
            <div class="flex justify-end p-4">
                <a href="{{route('register.user')}}" class="bg-blue-400 rounded-md px-4 py-2 text-white"> Register</a>
            </div>
        </div>
    </section>
</div>
@endsection