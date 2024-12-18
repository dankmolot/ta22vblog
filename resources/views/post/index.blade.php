@extends('post.layout')

@section('title', 'Your Posts')

@section('content')

<div class="overflow-x-auto">
    {{ $posts->links() }}

    <table class="table table-zebra table-pin-rows max-w-full">
        <thead class="text-xs uppercase">
            <tr>
                <th>Title</th>
                <th class="w-full">Description</th>
                <th>Last edit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="block max-w-full">
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td class="block whitespace-nowrap overflow-hidden max-h-16 max-w-inherit text-ellipsis">{{ $post->body }}</td>
                <td class="whitespace-nowrap">{{ $post->updated_at }}</td>
                <td class="flex gap-2">
                    <a class="btn btn-primary">Edit</a>
                    <a class="btn btn-outline btn-error">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}

</div>

@endsection
