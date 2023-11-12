<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $movieId)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->user()->id;
        $comment->movie_id = (int)$movieId;
        $comment->save();

        return redirect()->route('movies.show' , ['id' => $movieId]);
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();
        return redirect()->route('movies.show', $comment->movie_id);
    }
}
