<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list()
    {
        return view('lists.books', [
            'books' => Book::query()->paginate(10),
        ]);
    }

    public function create(BookCreateRequest $request)
    {
        $book = new Book();
        $book->name = $request->bookName;
        $book->type = $request->bookType;
        $book->author_id = $request->bookAuthor;
        $book->save();
        $book->genres()->sync($request->bookGenre);
        return redirect(route('booksList'));
    }

    public function delete(int $id)
    {
        Book::destroy($id);
        return redirect()->back();
    }

    public function update(BookCreateRequest $request)
    {
        $book = Book::find($request->bookId);
        $book->name = $request->bookName;
        $book->type = $request->bookType;
        $book->author_id = $request->bookAuthor;
        $book->save();
        $book->genres()->sync($request->bookGenre);
        return redirect(route('booksList'));
    }
}
