<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookCreateRequest;
use App\Http\Requests\Api\BookDeleteRequest;
use App\Http\Requests\Api\BookUpdateRequest;
use App\Models\Book;
use App\Traits\ValidateAuthor;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ValidateAuthor;

    public function detail(Request $request)
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
        $this->validateAuthor($request->user(), $book->author_id);
        if ($request->has('name')) {

            $book->name = $request->name;
        }
        if ($request->has('type')) {
            $book->type = $request->type;
        }
        if ($request->has('author')) {
            $book->author_id = $request->author;
        }
        $book->save();
        if ($request->has('genre')) {
            $book->genres()->sync($request->genre);
        }
        return response()->json(['message' => 'update is success']);
    }

    public function delete(BookDeleteRequest $request)
    {
        $book = Book::find($request->id);
        $this->validateAuthor($request->user(), $book->author_id);
        $book->destroy($request->id);
        return response()->json(['message' => 'delete is success']);
    }
}
