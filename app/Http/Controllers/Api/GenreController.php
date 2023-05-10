<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function list()
    {
        return response()->json(Genre::query()->with('books')->paginate(10));
    }
}
