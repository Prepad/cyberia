<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorCreateRequest;
use App\Http\Requests\Admin\AuthorUpdateRequest;
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

    public function detail(int $id)
    {
        return view('detail.author',
            [
                'author' => Author::find($id),
            ]
        );
    }

    public function create(AuthorCreateRequest $request)
    {
        $author = new Author();
        $author->name = $request->authorName;
        $author->save();
        return redirect(route('authorsList'));
    }

    public function update(AuthorUpdateRequest $request)
    {
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
