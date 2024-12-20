<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl leading-tight flex-1">
                @yield('title')
            </h2>
            @yield('actions')
        </div>
    </x-slot>

    <div class="m-4 flex flex-col gap-4">
        @yield('content')
    </div>
</x-app-layout>
