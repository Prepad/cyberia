<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        return view('lists.authors', [
            'authors' => Author::query()->paginate(10),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'authorName' => 'required',
            ],
            [
                'authorName.required' => 'Введите имя автора',
            ]
        );
        $author = new Author();
        $author->name = $request->authorName;
        $author->save();
        return redirect(route('authorsList'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'authorName' => 'required',
            ],
            [
                'authorName.required' => 'Введите название жанра',
            ]
        );
        $author = Author::find($request->authorId);
        $author->name = $request->authorName;
        $author->save();
        return redirect(route('authorsList'));
    }

    public function delete(int $id)
    {
        Author::destroy($id);
        return redirect()->back();
    }
}
