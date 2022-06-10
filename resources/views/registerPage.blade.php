@extends('layouts.guest')
@section('section')

    <div>
        Login As
        <a href="{{route('register.user')}}">
            Customer
        </a>
        <a href="{{route('register.company')}}">
        Company    
        </button>
    </div>
@endsection