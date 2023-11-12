<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show')->middleware('check.user.access.to.show.page');

