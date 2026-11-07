@extends('v1.layout')
@section('title','Welcome')

@section('content')
<div class='container'>
    <div class='title'>User Management Dashboard</div>
            @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" >Dashboard</a>
                @else
                <a href="{{ route('login') }}" >Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" >Register</a>
                @endif
                @endauth
            @endif
</div>
@endsection
