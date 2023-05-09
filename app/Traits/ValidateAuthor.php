<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ValidateAuthor
{
    public function validateAuthor(User $user, int $authorId)
    {
        if (is_null($user->authors()->find($authorId))) {
            throw new HttpResponseException(response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => [
                    'author_validate_error' => 'Ошибка валидации автора',
                ]
            ], 422));
        }
    }
}
