<?php

namespace App\Http\Requests\Api;

use App\Enums\BookTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BookCreateRequest extends FormRequest
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
            'name' => 'required|unique:books,name',
            'type' => ['required', Rule::in(array_column(\App\Enums\BookTypeEnum::cases(), 'name'))],
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название книги',
            'name.unique' => 'Такое название книги уже существует',
            'type.required' => 'Введите тип издания',
            'type.in' => 'Такого типа не существует',
            'author.required' => 'Введите автора книги',
            'author.exists' => 'Такого автора не существует',
            'genre.required' => 'Введите жанр книги',
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
