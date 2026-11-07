@extends('v1.layout')
@section('title', 'Edit user')
@section('content')
<div class='container'>
    <div class='title'>Update User</div>
    @include('v1.crud.errors')
    <form action='{{ route('update-user', $user->id) }}' method="post">
        @csrf
        <input type='text' name='name' placeholder='name' value="{{ old('name', $user->name) }}" required>
        <input type='email' name='email' placeholder='email' value="{{ old('email', $user->email) }}" required>
        <input type='password' name='password' placeholder='new password (leave blank to keep)' minlength="8">
        <div><input type='submit' class='bottone add addForm' value="Update user"></div>
    </form>
    <a href="{{ route('dashboard') }}">&larr; Back to list</a>
</div>
@endsection
