<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', [\App\Http\Controllers\Api\BookController::class, 'showBooks'])->name('api.books');
Route::get('/authors', [\App\Http\Controllers\Api\AuthorController::class, 'showAuthors'])
    ->name('api.authors');
Route::get('/authors/{authorId}', [\App\Http\Controllers\Api\BookController::class, 'getBooksByAuthor'])
    ->name('api.authorBooks');
