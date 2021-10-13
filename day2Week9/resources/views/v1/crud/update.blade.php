@extends('v1.layout')
@section('title','index')
@section('content')
<div class='container'>
<div class='title'>Update User</div>
<form action='' method="post">
    <input type="hidden" name="_token" value='{{csrf_token()}}'>
    {{-- qua fa controllo di sicurezza --}}
    <input type='text' name='name' placeholder='name' value="{{$users->name}}">
    <input type='email' name='email' placeholder='email' value="{{$users->email}}">
    <input type='password' name='password' placeholder='password' value="{{$users->password}}">
    <div><input type='submit' class ='bottone add addForm'value="Update user"></div>
</form>
</div>
@endsection
