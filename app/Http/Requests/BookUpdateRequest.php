<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'bookName' => 'required|unique:books,name',
            'bookType' => 'required',
            'bookAuthor' => 'required',
            'bookGenre' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'bookName.required' => 'Введите название книги',
            'bookName.unique' => 'Такое название книги уже существует',
            'bookType.required' => 'Введите тип издания',
            'bookAuthor.required' => 'Введите автора книги',
            'bookGenre.required' => 'Введите жанр книги',
        ];
    }
}
