@extends('post.layout')

@section('title', 'Create a new post')

@section('content')

<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="w-full max-w-screen-sm mx-auto bg-base-100 px-4 flex flex-col gap-4">
    @csrf
    <h1 class="text-2xl bold font-semibold mx-auto mt-4">Post creator 3000</h2>
    <!-- Post Title -->
    <div>
        <x-input-label for="title" value="Title" />
        <x-text-input id="title" class="w-full" type="text" name="title" required placeholder="Amazing title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Post Body -->
    <div>
        <x-input-label for="body" value="Body" />
        <x-textarea id="body" class="w-full" name="body" required placeholder="Write your post here"/>
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
    </div>

    <!-- Create -->
    <div class="flex mx-auto gap-4">
        <button class="btn btn-primary" type="submit">Create Post</button>
        <a class="btn btn-secondary" type="submit" href="{{ route('post.index') }}">Back</a>
    </div>
<div>

@endsection
