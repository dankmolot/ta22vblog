@extends('user.layout')

@section('title', 'User')

@section('actions')
<div>
    <a href="{{ route('user.index') }}" class="btn btn-primary">Back to users</a>
</div>
@endsection

@section('content')

<div class="w-full max-w-screen-sm mx-auto bg-base-100 py-4 px-6 flex flex-col">
    <h1 class="text-2xl bold font-semibold mx-auto mt-4">User details</h2>
    <!-- Just text elements with format field: value -->
    <span><strong>ID:</strong> {{ $user->id }}</span>
    <span><strong>Name:</strong> {{ $user->name }}</span>
    <span><strong>Email:</strong> {{ $user->email }}</span>
    <span><strong>Created at:</strong> {{ $user->created_at }}</span>
</div>

@endsection
