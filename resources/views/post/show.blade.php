@extends('post.layout')

@section('title', 'Post')

@section('actions')
<div>
    <button onclick="history.back()" class="btn btn-primary">Go back</a>
</div>
@endsection

@section('content')

<div class="w-full max-w-screen-sm mx-auto">
    <!-- Post section -->
    <div class="bg-base-100 py-4 px-6 flex flex-col mb-4">
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

    <!-- Comments section -->
    <div class="bg-base-100 py-4 px-6 flex flex-col">
        <h2 class="text-2xl font-bold mb-4">Comments</h2>
        <div class="border border-base-content mb-4 opacity-10"></div>

        @foreach ($post->comments as $comment)
            <div class="bg-base-200 py-4 px-6 mb-4">
                <div class="flex justify-between items-end mb-4">
                    <span class="text-lg font-bold">{{ $comment->user->name }}</span>
                    <span class="text-xs opacity-50">{{ $comment->created_at }}</span>
                </div>

                <p>{{ $comment->content }}</p>

                @if ($comment->user_id == auth()->user()->id)
                    <!-- Comment actions (only for creator) -->
                    <div class="flex justify-end text-xs underline opacity-50 mt-2">
                        <button form="delete-comment-{{$comment->id}}">Delete</button>
                        <form id="delete-comment-{{$comment->id}}" action="{{ route('post.comment.destroy', [$post, $comment]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Comment input -->
        <form class="flex items-center" action="{{ route('post.comment', $post) }}" method="POST">
            @csrf
            <x-textarea name="content" placeholder="Write a comment..." class="flex-1"></x-textarea>
            <button class="btn btn-primary ml-4" type="submit">Send</button>
        </div>
    </div>
</div>

@endsection
