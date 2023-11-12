<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::all();
        return view('dashboard', ['movies' => $movies]);
    }

    public function show($id): View
    {
        $movie = Movie::find($id);
        $comments = Comment::where('movie_id', (int)$id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('movies.show', compact('movie', 'comments'));
    }
}
