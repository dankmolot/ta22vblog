@extends('user.layout')

@section('title', 'Create an user')

@section('content')

<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" class="w-full max-w-screen-sm mx-auto bg-base-100 px-4 flex flex-col gap-4">
    @csrf
    <h1 class="text-2xl bold font-semibold mx-auto mt-4">User creator 3000</h2>
    <!-- User name -->
    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" class="w-full" type="text" name="name" required placeholder="Joe" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- User email -->
    <div>
        <x-input-label for="email" value="Email" />
        <x-text-input id="email" class="w-full" name="email" required placeholder="joe@example.com"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- User password -->
    <div>
        <x-input-label for="password" value="Password" />
        <x-text-input id="password" class="w-full" type="password" name="password" required placeholder="WARMACHINEROX"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Create -->
    <div class="flex mx-auto gap-4">
        <button class="btn btn-primary" type="submit">Create an user</button>
        <a class="btn btn-secondary" type="submit" href="{{ route('user.index') }}">Back</a>
    </div>
<div>

@endsection
