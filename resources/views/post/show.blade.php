@extends('post.layout')

@section('title', 'Post')

@section('actions')
<div>
    <a href="{{ route('post.index') }}" class="btn btn-primary">Back to posts</a>
</div>
@endsection

@section('content')

<div class="w-full max-w-screen-sm mx-auto bg-base-100 py-4 px-6 flex flex-col">
    <div class="flex justify-between items-end mb-6">
        <h1 class="text-5xl font-bold">{{ $post->title }}</h1>
        <div class="flex flex-col items-end text-xs opacity-50">
            <span>at {{ $post->updated_at }}</span>
            <span>by {{ $post->user->name }}</span>
        </div>
    </div>
    <div class="border border-base-content mb-4 opacity-10"></div>

    <p class="mb-4">{{ $post->body }}</p>

    <div class="flex justify-between text-xs opacity-50">
        <span>Last edit: {{ $post->updated_at }}</span>
        <span>Author: {{ $post->user->name }}</span>
    </div>
</div>

@endsection
