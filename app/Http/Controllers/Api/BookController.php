<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookCreateRequest;
use App\Http\Requests\Api\BookDeleteRequest;
use App\Http\Requests\Api\BookDetailRequest;
use App\Http\Requests\Api\BookUpdateRequest;
use App\Models\Book;
use App\Traits\ValidateAuthor;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function detail(BookDetailRequest $request)
    {
        return response()->json(Book::with('genres')->find($request->id));
    }

    public function list()
    {
        return response()->json(Book::query()->with('Author')->paginate(10));
    }

    public function update(BookUpdateRequest $request)
    {
        $book = Book::find($request->id);
        $request->user()->validateAuthor($book->author_id);
        $book->name = $request->name ?? $book->name;
        $book->type = $request->type ?? $book->type;
        $book->author_id = $request->author ?? $book->author_id;
        $book->save();
        if ($request->has('genre')) {
            $book->genres()->sync($request->genre);
        }
        return response()->json(['message' => 'update is success']);
    }

    public function delete(BookDeleteRequest $request)
    {
        $book = Book::find($request->id);
        $request->user()->validateAuthor($book->author_id);
        $book->destroy($request->id);
        return response()->json(['message' => 'delete is success']);
    }
}
