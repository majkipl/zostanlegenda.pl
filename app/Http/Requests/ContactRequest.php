<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'bail|required|string|min:3|max:128',
            'email' => 'bail|required|string|max:255|email:rfc,dns',
            'message' => 'bail|required|string|max:4096',
        ];

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'Pole jest wymagane.',
            'string' => 'Wprowadź wartość tekstową.',
            'min' => 'Pole wymaga minimum :min znaków.',
            'max' => 'Pole wymaga maksymalnie :max znaków.',
            'email' => 'Błędny format wprowadzonych danych.',
        ];
    }
}
