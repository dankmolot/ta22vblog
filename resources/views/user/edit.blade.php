@extends('user.layout')

@section('title', 'Edit an user')

@section('content')

<form method="POST" action="{{ route('user.update', $user) }}" enctype="multipart/form-data" class="w-full max-w-screen-sm mx-auto bg-base-100 px-4 flex flex-col gap-4">
    @csrf
    @method('PUT')

    <h1 class="text-2xl bold font-semibold mx-auto mt-4">User editor!</h2>
    <!-- User name -->
    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" class="w-full" type="text" name="name" required placeholder="Joe" value="{{ $user->name }}" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- User email -->
    <div>
        <x-input-label for="email" value="Email" />
        <x-text-input id="email" class="w-full" name="email" required placeholder="joe@example.com" value="{{ $user->email }}" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- User password -->
    <div>
        <x-input-label for="password" value="Password" />
        <x-text-input id="password" class="w-full" type="password" name="password" placeholder="Enter a password to update"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Create -->
    <div class="flex mx-auto gap-4">
        <button class="btn btn-primary" type="submit">Edit the user</button>
        <a class="btn btn-secondary" type="submit" href="{{ route('user.index') }}">Back</a>
    </div>
<div>

@endsection
