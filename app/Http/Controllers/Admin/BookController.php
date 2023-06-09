<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookCreateRequest;
use App\Http\Requests\Admin\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list(Request $request)
    {
        $books = new Book();
        if ($request->has('search')) {
            $books = $books->where('name', 'like', '%' . $request->get('search') . '%');
        }
        if ($request->has('sort')) {
            $books = $books->orderBy('name', $request->get('sort'));
        }
        if ($request->has('author')) {
            $books = $books->where('author_id', '=', $request->get('author'));
        }
        if ($request->has('genre')) {
            $books = $books->whereHas('genres', function ($query) use ($request) {
                $query->where('genres.id', '=', $request->get('genre'));
            });
        }
        return view('lists.books', [
            'books' => $books->paginate(10),
        ]);
    }

    public function detail(int $id)
    {
        return view('detail.book',
            [
                'book' => Book::find($id),
            ]
        );
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

    public function update(BookUpdateRequest $request)
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
