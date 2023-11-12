<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $movie->name }} - Movie Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-800">
<div class="container p-4">
    <div class="mb-4 text-lg text-white text-center underline">
        <a href="/movies">BACK</a>
    </div>
    <div>
        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 font-bold text-gray-800 dark:text-gray-200 text-md">
            <h1 class="mb-4 text-xl underline">{{ $movie->name }}</h1>
            <p class="mb-4 text-lg">Description: {{ $movie->description }}</p>
            <p class="mb-2">Director: {{ $movie->director }}</p>
            <p class="mb-2">Genre: {{ $movie->genre }}</p>
            <p class="mb-2">Release Date: {{ $movie->release_date }}</p>
        </div>
    </div>
    <div class="flex flex-column justify-center items-center mt-4">
        <form action="{{ route('comment.store', ['movieId' => $movie->id]) }})" method="POST">
            @csrf
            <div class="mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <textarea name="comment" id="comment" rows="8" cols="55" class="resize-none px-3 py-2 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                <div class="flex items-center justify-center px-3 py-2 border-t dark:border-gray-600">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Send Comment
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div>
        @if($comments->count() > 0)
            @foreach($comments as $comment)
                <div class="flex justify-between mb-4 px-6 py-2 my-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{$comment->user->name}} </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{$comment->comment}} </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="mb-3 mr-2 font-normal text-gray-700 dark:text-gray-400 text-right"> {{$comment->created_at}} </p>
                        @if($comment->user_id === auth()->user()->id || auth()->user()->is_admin)
                            <form action="{{ route('comment.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 dark:text-red-400 text-right">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 dark:text-gray-400 text-center">No comments yet.</p>
        @endif
    </div>
</div>
</body>
</html>
