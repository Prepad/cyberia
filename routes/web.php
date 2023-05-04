<?php

use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\GenreController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
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

Route::get('/book/detail/{id}', function ($id) {
    return view('detail.book',
        [
            'book' => Book::find($id),
        ]
    );
})->name('bookDetail');

Route::get('/book/create/', function () {
    return view('create.book');
})->name('bookCreateForm');

Route::get('/book/update/{id}', function (int $id) {
    return view('update.book',
        [
            'book' => Book::find($id),
        ]
    );
})->name('bookUpdateForm');

Route::post('/book/update/', [BookController::class, 'update'])->name('bookUpdate');

Route::post('/book/create/', [BookController::class, 'create'])->name('bookCreate');

Route::get('/book/delete/{id}', [BookController::class, 'delete'])->name('bookDelete');

Route::get('/authors', [AuthorController::class, 'list'])->name('authorsList');

Route::get('/author/detail/{id}', function ($id) {
    return view('detail.author',
        [
            'author' => Author::find($id),
        ]
    );
})->name('authorDetail');

Route::get('/author/create/', function () {
    return view('create.author');
})->name('authorCreateForm');

Route::get('/author/update/{id}', function (int $id) {
    return view('update.author',
        [
            'author' => Author::find($id),
        ]
    );
})->name('authorUpdateForm');

Route::post('/author/update/', [AuthorController::class, 'update'])->name('authorUpdate');

Route::post('/author/create/', [AuthorController::class, 'create'])->name('authorCreate');

Route::get('/author/delete/{id}', [AuthorController::class, 'delete'])->name('authorDelete');

Route::get('/genres', [GenreController::class, 'list'])->name('genresList');

Route::get('/genre/create/', function () {
    return view('create.genre');
})->name('genreCreateForm');

Route::post('/genre/create/', [GenreController::class, 'create'])->name('genreCreate');

Route::get('/genre/update/{id}', function (int $id) {
    return view('update.genre',
        [
            'genre' => Genre::find($id),
        ]
    );
})->name('genreUpdateForm');

Route::post('/genre/update/', [GenreController::class, 'update'])->name('genreUpdate');

Route::get('/genre/{id}', function ($id) {
    return view('detail.genre',
        [
            'genre' => Genre::find($id),
        ]
    );
})->name('genreDetail');

Route::get('/genre/delete/{id}', [GenreController::class, 'delete'])->name('genreDelete');
