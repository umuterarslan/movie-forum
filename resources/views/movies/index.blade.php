<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Movie List</title>
</head>
<body>
<h1>Movie List</h1>

<ul>
    @foreach($movies as $movie)
        <a href="{{ route('movies.show', $movie->id) }}">
            {{ $movie->name }} - {{ $movie->release_date }}
        </a>
    @endforeach
</ul>

</body>
</html>
