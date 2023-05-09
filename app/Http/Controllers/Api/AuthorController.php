<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorCreateRequest;
use App\Http\Requests\Api\AuthorDetailRequest;
use App\Http\Requests\Api\AuthorUpdateRequest;
use App\Models\Author;
use App\Traits\ValidateAuthor;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ValidateAuthor;

    public function detail(AuthorDetailRequest $request)
    {
        return response()->json(Author::with('books')->find($request->id));
    }

    public function list()
    {
        return response()->json(Author::query()->withCount('books')->paginate(10));
    }

    public function update(AuthorUpdateRequest $request)
    {
        $author = Author::find($request->input('id'));
        $this->validateAuthor($request->user(), $author->id);
        if ($request->has('name')) {
            $author->name = $request->name;
        }
        $author->save();
        return response()->json(['message' => 'create is success']);
    }
}
