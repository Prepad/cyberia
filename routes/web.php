<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\GenreController;
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

Route::view('/', 'home')->name('home');

Route::get('/books', [BookController::class, 'list'])->name('booksList');

Route::get('/book/detail/{id}', [BookController::class, 'detail'])->name('bookDetail');

Route::view('/book/create/', 'create.book')->name('bookCreateForm');

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

Route::get('/author/detail/{id}', [AuthorController::class, 'detail'])->name('authorDetail');

Route::view('/author/create/', 'create.author')->name('authorCreateForm');

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

Route::view('/genre/create/', 'create.genre')->name('genreCreateForm');

Route::post('/genre/create/', [GenreController::class, 'create'])->name('genreCreate');

Route::get('/genre/update/{id}', function (int $id) {
    return view('update.genre',
        [
            'genre' => Genre::find($id),
        ]
    );
})->name('genreUpdateForm');

Route::post('/genre/update/', [GenreController::class, 'update'])->name('genreUpdate');

Route::get('/genre/detail/{id}', [GenreController::class, 'detail'])->name('genreDetail');

Route::get('/genre/delete/{id}', [GenreController::class, 'delete'])->name('genreDelete');
