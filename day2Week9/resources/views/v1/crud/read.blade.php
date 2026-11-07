@extends('v1.layout')
@section('title', 'Users')

@section('content')
<div class='container'>
    <div class='title'>See Users</div>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bottone icon-btn" title="Logout"><img id='logout' src='{{ asset('img/logout.png') }}' alt="Logout"></button>
        </form>
    </div>
    <table class='table'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th class='bottone add'><a href="{{ route('add-users') }}" title="Add user"><img src='{{ asset('img/add-friend.png') }}' alt="Add user"></a></th>
        </tr>
        @foreach($users as $user)
        <tr class='row'>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <span class='bottone update'><a href="{{ route('update-user', $user->id) }}" title="Edit"><img src='{{ asset('img/refresh.png') }}' alt="Edit"></a></span>
                <form method="POST" action="{{ route('delete-user', $user->id) }}" class="inline-form" onsubmit="return confirm('Delete {{ $user->name }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='bottone delete icon-btn' title="Delete"><img src='{{ asset('img/trash.png') }}' alt="Delete"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</div>
@endsection
