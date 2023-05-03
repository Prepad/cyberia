<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        return view('lists.authors', [
            'authors' => Author::query()->paginate(10),
        ]);
    }
}
