<?php

namespace App\Http\Requests\Api;

use App\Traits\ValidateFail;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BookDeleteRequest extends FormRequest
{
    use ValidateFail;
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
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Отсутствует идентификатор книги',
            'id.exists' => 'Такой книги не существует',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validateFailResponse($validator);
    }
}
