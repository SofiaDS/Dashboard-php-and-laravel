
@extends('v1.layout')
@section('title','index')
@section('content')
<div class='container'>
    <div class='title'>Add User</div>
    <form action='' method="post">
        <input type="hidden" name="_token" value='{{csrf_token()}}'>
        {{-- qua fa controllo di sicurezza --}}
        <input type='text' name='name' placeholder='name'>
        <input type='email' name='email' placeholder='email'>
        <input type='password' name='password' placeholder='password'>
        <div ><input class ='bottone add addForm'type='submit'></div>
    </form>

</div>
@endsection
