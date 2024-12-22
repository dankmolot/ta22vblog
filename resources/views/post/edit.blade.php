@extends('post.layout')

@section('title', 'Edit the post')

@section('content')

<form method="POST" action="{{ route('post.update', $post->id) }}" class="w-full max-w-screen-sm mx-auto bg-base-100 px-4 flex flex-col gap-4">
    @csrf
    @method('PUT')

    <h1 class="text-2xl bold font-semibold mx-auto mt-4">Post editor 4000</h2>
    <!-- Post Title -->
    <div>
        <x-input-label for="title" value="Title" />
        <x-text-input id="title" class="w-full" type="text" name="title" required placeholder="Amazing title" value="{{ $post->title }}" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Post Body -->
    <div>
        <x-input-label for="body" value="Body" />
        <x-textarea id="body" class="w-full" name="body" required placeholder="Write your post here">{{ $post->body }}</x-textarea>
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
    </div>

    <!-- Post tags -->
    <details class="dropdown">
        <summary class="btn btn-outline m-1">Select tags</summary>
        <div class="form-control menu dropdown-content w-full bg-base-300 shadow-xl flex flex-row flex-wrap justify-between gap-3">
            @foreach($tags as $tag)
                <label class="label cursor-pointer w-fit">
                    <span class="label-text">{{ $tag->name }}</span>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $post->hasTag($tag) ? 'checked' : '' }} class="checkbox ml-2" />
                </label>
            @endforeach
        </div>
    </details>

    <!-- Edit -->
    <div class="flex mx-auto gap-4">
        <button class="btn btn-primary" type="submit">Edit Post</button>
        <a class="btn btn-secondary" type="submit" href="{{ route('post.index') }}">Back</a>
    </div>
<div>

@endsection
