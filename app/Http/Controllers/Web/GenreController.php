<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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

    public function create(Request $request)
    {
        $request->validate(
            [
                'genreName' => 'required',
            ],
            [
                'genreName.required' => 'Введите название жанра',
            ]
        );
        $genre = new Genre();
        $genre->name = $request->genreName;
        $genre->save();
        return redirect(route('genresList'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'genreName' => 'required',
            ],
            [
                'genreName.required' => 'Введите название жанра',
            ]
        );
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
