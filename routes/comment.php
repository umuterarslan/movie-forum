<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::post('/comment/{movieId}/', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
