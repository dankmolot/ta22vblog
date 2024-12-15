@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm label']) }}>
        @foreach ((array) $messages as $message)
            <li class="label-text-alt text-red-600">{{ $message }}</li>
        @endforeach
    </ul>
@endif
