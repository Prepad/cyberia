<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BookController::class, 'list']);
Route::get('/books/{id}', [BookController::class, 'detail']);
Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/{id}', [AuthorController::class, 'detail']);
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'delete']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
});


