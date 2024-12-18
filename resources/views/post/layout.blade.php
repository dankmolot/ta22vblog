<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="m-4 flex flex-col gap-4">
        @yield('content')
    </div>
</x-app-layout>
