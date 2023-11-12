<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Have fun 😇') }}
        </h2>
    </x-slot>
        <ul class="py-4">
            @foreach($movies as $movie)
                <div class="py-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <a href="{{ route('movies.show', $movie->id) }}">
                                <div class="p-6 text-gray-900 dark:text-gray-100 text-center"> {{ $movie->name }} - {{ $movie->director }} </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
</x-app-layout>
