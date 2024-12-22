@extends('tag.layout')

@section('title', 'Tags')

@section('actions')
<button onclick="create_tag.showModal()" class="btn btn-primary">Create a tag</button>

<dialog id="create_tag" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Tag maker SUPER PRO EDITION</h3>
        <form method="POST" action="{{ route('tag.store') }}" id="create_tag_form">
            @csrf

            <x-input-label for="create_tag_name" value="Name" />
            <x-text-input id="create_tag_name" class="w-full" type="text" name="name" required placeholder="hype" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </form>
        <div class="modal-action">
            <button class="btn btn-primary" form="create_tag_form">Create</button>
            <form method="dialog">
                <button class="btn">Cancel</button>
            </form>
        </div>
    </div>
</dialog>
@endsection

@section('content')

<div class="overflow-x-auto">
    {{ $tags->links() }}

    <table class="table table-zebra table-pin-rows w-full">
        <thead class="text-xs uppercase">
            <tr>
                <th>Name</th>
                <th>Posts</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td width="99%">{{ $tag->name }}</td>
                <td>{{ $tag->posts->count() }}</td>
                <td class="flex gap-2">
                    <a class="btn btn-primary" href="{{ route('tag.show', $tag) }}">View</a>
                    <button class="btn btn-secondary" onclick="edit_tag_{{$tag->id}}.showModal()">Edit</a>
                    <button class="btn btn-outline btn-error" form="destroy-{{$tag->id}}">Delete</button>
                </td>
                <!-- Edit modal -->
                <dialog id="edit_tag_{{$tag->id}}" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold mb-4">Tag editor PRO MAX STUDIO</h3>
                        <form method="POST" action="{{ route('tag.update', $tag) }}" id="edit_tag_form_{{$tag->id}}">
                            @csrf
                            @method('PUT')

                            <x-input-label for="edit_tag_name_{{$tag->id}}" value="Name" />
                            <x-text-input id="edit_tag_name_{{$tag->id}}" class="w-full" type="text" name="name" required placeholder="hype" value="{{ $tag->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </form>
                        <div class="modal-action">
                            <button class="btn btn-primary" form="edit_tag_form_{{$tag->id}}">Edit</button>
                            <form method="dialog">
                                <button class="btn">Cancel</button>
                            </form>
                        </div>
                    </div>
                </dialog>
                <!-- Delete form -->
                <form id="destroy-{{$tag->id}}" action="{{route('tag.destroy', $tag)}}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tags->links() }}

</div>

@endsection
