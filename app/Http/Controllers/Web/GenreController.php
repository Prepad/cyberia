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
}
