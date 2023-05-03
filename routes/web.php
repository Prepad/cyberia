<?php

use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\GenreController;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/books', [BookController::class, 'list'])->name('booksList');

Route::get('/book/create', function () {
    return view('create.book');
})->name('bookCreateForm');

Route::post('/book/save', [BookController::class, 'create'])->name('bookCreate');

Route::get('/authors', [AuthorController::class, 'list'])->name('authorsList');

Route::get('/genres', [GenreController::class, 'list'])->name('genresList');
