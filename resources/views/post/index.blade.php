@extends('post.layout')

@section('title', 'Your Posts')

@section('actions')
<div>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
</div>
@endsection

@section('content')

<div class="overflow-x-auto">
    {{ $posts->links() }}

    <table class="table table-zebra table-pin-rows w-full">
        <thead class="text-xs uppercase">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Last edit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td width="99%">{{ $post->snippet }}</td>
                <td class="whitespace-nowrap">{{ $post->updated_at }}</td>
                <td class="flex gap-2">
                    <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">View</a>
                    <a class="btn btn-secondary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <button class="btn btn-outline btn-error" form="destroy-{{$post->id}}">Delete</button>
                </td>
                <form id="destroy-{{$post->id}}" action="{{route('post.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

</div>

@endsection
