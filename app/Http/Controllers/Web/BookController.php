<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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

    public function create(Request $request)
    {
        $request->validate(
            [
                'bookName' => 'required|unique:books,name',
                'bookType' => 'required',
                'bookAuthor' => 'required',
                'bookGenre' => 'required',
            ],
            [
                'bookName.require' => 'Введите название книги',
                'bookName.unique' => 'Такое название книги уже существует',
                'bookType.require' => 'Введите тип издания',
                'bookAuthor.require' => 'Введите автора книги',
                'bookGenre.require' => 'Введите жанр книги',
            ]
        );
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

    public function update(Request $request)
    {
        $request->validate(
            [
                'bookName' => 'required|unique:books,name',
                'bookType' => 'required',
                'bookAuthor' => 'required',
                'bookGenre' => 'required',
            ],
            [
                'bookName.required' => 'Введите название книги',
                'bookName.unique' => 'Такое название книги уже существует',
                'bookType.required' => 'Введите тип издания',
                'bookAuthor.required' => 'Введите автора книги',
                'bookGenre.required' => 'Введите жанр книги',
            ]
        );
        $book = Book::find($request->bookId);
        $book->name = $request->bookName;
        $book->type = $request->bookType;
        $book->author_id = $request->bookAuthor;
        $book->save();
        $book->genres()->sync($request->bookGenre);
        return redirect(route('booksList'));
    }
}
