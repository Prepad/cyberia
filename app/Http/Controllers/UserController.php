<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function tokens(): View
    {
        $tokens = Auth::user()->tokens;
        return view('tokens', ['tokens' => $tokens]);
    }

    public function createToken(Request $request): View
    {
        $plainToken = Auth::user()->createToken($request->name)->plainTextToken;
        return view('plaintoken', ['token' => $plainToken]);
    }
}
