@extends('v1.layout')
@section('title', 'Add user')
@section('content')
<div class='container'>
    <div class='title'>Add User</div>
    @include('v1.crud.errors')
    <form action='{{ route('add-users') }}' method="post">
        @csrf
        <input type='text' name='name' placeholder='name' value="{{ old('name') }}" required>
        <input type='email' name='email' placeholder='email' value="{{ old('email') }}" required>
        <input type='password' name='password' placeholder='password (min 8)' required minlength="8">
        <div><input class='bottone add addForm' type='submit' value="Add user"></div>
    </form>
    <a href="{{ route('dashboard') }}">&larr; Back to list</a>
</div>
@endsection
