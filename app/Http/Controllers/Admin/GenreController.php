<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreCreateRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function list()
    {
        return view('lists.genres',
        [
            'genres' => Genre::query()->paginate(10),
        ]);
    }

    public function detail(int $id)
    {
        return view('detail.genre',
            [
                'genre' => Genre::find($id),
            ]
        );
    }

    public function create(GenreCreateRequest $request)
    {
        $genre = new Genre();
        $genre->name = $request->genreName;
        $genre->save();
        return redirect(route('genresList'));
    }

    public function update(GenreUpdateRequest $request)
    {
        $genre = Genre::find($request->genreId);
        $genre->name = $request->genreName;
        $genre->save();
        return redirect(route('genresList'));
    }

    public function delete(int $id)
    {
        Genre::destroy($id);
        return redirect()->back();
    }
}
