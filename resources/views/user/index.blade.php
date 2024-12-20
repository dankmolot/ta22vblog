@extends('user.layout')

@section('title', 'Users')

@section('actions')
<div>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Create a user</a>
</div>
@endsection

@section('content')

<div class="overflow-x-auto">
    {{ $users->links() }}

    <table class="table table-zebra table-pin-rows w-full">
        <thead class="text-xs uppercase">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td width="99%">{{ $user->email }}</td>
                <td class="whitespace-nowrap">{{ $user->created_at }}</td>
                <td class="flex gap-2">
                    <a class="btn btn-primary" href="{{ route('user.show', $user->id) }}">View</a>
                    <a class="btn btn-secondary" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    <button class="btn btn-outline btn-error" form="destroy-{{$user->id}}">Delete</button>
                </td>
                <form id="destroy-{{$user->id}}" action="{{route('user.destroy', $user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

</div>

@endsection
