<?php

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

Route::get('/books', function () {
    return view('lists.books', [
        'books' => Book::query()->paginate(10),
    ]);
})->name('booksList');

Route::get('/authors', function () {
    return view('lists.authors', [
        'authors' => Author::query()->paginate(10),
    ]);
})->name('authorsList');
