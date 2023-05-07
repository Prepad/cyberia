<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorCreateRequest;
use App\Http\Requests\Api\AuthorUpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function detail(Request $request)
    {
        return response()->json(Author::find($request->id));
    }

    public function list()
    {
        return response()->json(Author::paginate(10));
    }

    public function create(AuthorCreateRequest $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->save();
        return response()->json(['message' => 'create is success']);
    }

    public function update(AuthorUpdateRequest $request)
    {
        dd($request->all());
        $author = Author::find($request->input('id'));
        $author->name = $request->name;
        $author->save();
        return response()->json(['message' => 'create is success']);
    }

    public function delete(Request $request)
    {
        Book::destroy($request->id);
        return response()->json(['message' => 'delete is success']);
    }
}
