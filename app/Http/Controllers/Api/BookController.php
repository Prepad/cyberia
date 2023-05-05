<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookCreateRequest;
use App\Http\Requests\Api\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function detail(Request $request)
    {
        return response()->json(Book::with('genres')->find($request->id));
    }

    public function list()
    {
        return response()->json(Book::paginate(10));
    }

    public function create(BookCreateRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->type = $request->type;
        $book->author_id = $request->author;
        $book->save();
        $book->genres()->sync($request->genre);
        return response()->json(['message' => 'create is success']);
    }

    public function update(BookUpdateRequest $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->type = $request->type;
        $book->author_id = $request->author;
        $book->save();
        $book->genres()->sync($request->genre);
        return response()->json(['message' => 'create is success']);
    }

    public function delete(Request $request)
    {
        Book::destroy($request->id);
        return response()->json(['message' => 'delete is success']);
    }
}
