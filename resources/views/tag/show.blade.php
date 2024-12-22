@extends('tag.layout')

@section('title', 'Posts with tag ' . $tag->name)

@section('actions')
<div>
    <button onclick="history.back()" class="btn btn-primary">Go back</a>
</div>
@endsection

@section('content')

{{ $posts->links() }}

@foreach( $posts as $post )
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <!-- Title -->
            <h2 class="card-title text-2xl">{{ $post->title }}</h2>

            <!-- Short description -->
            <p>{{ $post->snippet }}</p>

            <!-- Tags -->
            <div class="card-actions">
                @foreach( $post->tags as $tag )
                    <a class="badge" href="{{ route('tag.show', $tag) }}">{{ $tag->name }}</a>
                @endforeach
            </div>

            <!-- Author, date and actions -->
            <div class="card-actions justify-between items-center mt-4">
                <div class="flex flex-col opacity-50 text-sm">
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                    <span>By {{ $post->user->name }}</span>
                </div>
                <a class="btn btn-primary" href="{{ route('post.show', $post) }}">Read more</a>
            </div>
        </div>
    </div>
@endforeach

{{ $posts->links() }}

@endsection
