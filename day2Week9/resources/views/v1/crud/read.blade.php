@extends('v1.layout')
@section('title','users-list')

@section('content')

<div class='container'>
    <div class='title'>See User</div>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" class="bottone"onclick="event.preventDefault();this.closest('form').submit();"><img id='logout' src='{{asset('img/logout.png')}}'></a>
        </form>
    </div>
    <table class='table'>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th class='bottone add'><a href="{{route('add-users')}}"><img src='{{asset('img/add-friend.png')}}'></a></th>
        </tr>
            @foreach($users as $user)
            <tr id='odd'>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <span class='bottone update'><a  href="{{route('update-user', $user->id)}}"><img src='{{asset('img/refresh.png')}}'></a></span>
                    <span class='bottone delete'><a  href="{{route('delete-user', $user->id)}}"><img src='{{asset('img/trash.png')}}'></a></span>
                </td>
            </tr>
            @endforeach
            {{$users->links()}}
        </table>
        {{-- per fargli fare i link delle varie pagine --}}
    </div>
</div>
@endsection
