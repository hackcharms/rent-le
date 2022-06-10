@extends('layouts.guest')
@section('section')

    <div>
        Login As
        <a href="{{route('login.user')}}">
            Customer
        </a>
        <a href="{{route('login.company')}}">
        Company    
        </button>
    </div>
@endsection