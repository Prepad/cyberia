<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:books',
            'name' => 'unique:books,name',
            'type' => [Rule::in(array_column(\App\Enums\BookTypeEnum::cases(), 'name'))],
            'author' => 'exists:authors,id',
            'genre' => 'exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Отсутствует идентификатор книги',
            'id.exists' => 'Такой книги не существует',
            'name.unique' => 'Такое название книги уже существует',
            'type.in' => 'Такого типа не существует',
            'author.exists' => 'Такого автора не существует',
            'genre.exists' => 'Такого жанра не существует',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
