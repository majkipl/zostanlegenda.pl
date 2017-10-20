<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'birthday' => 'bail|required|date_format:d-m-Y|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'address' => 'bail|required|string|max:255',
            'city' => 'bail|required|string|min:2|max:64',
            'zip' => 'bail|required|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'email' => 'bail|required|email:rfc,dns|unique:promotions,email',
            'phone' => [
                'bail',
                'required',
                'regex:/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/'
            ],
            'receiptnb' => 'bail|required|string|max:32',
            'category' => 'bail|required|numeric|exists:categories,id',
            'product' => 'bail|required|numeric|exists:products,id',
            'shop' => 'bail|required|numeric|exists:shops,id',
            'whence' => 'bail|required|numeric|exists:whences,id',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'img_ean' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail|required',
            'legal_4' => 'bail|required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Pole jest wymagane.',
            'string' => 'Wprowadź wartość tekstową.',
            'min' => 'Pole wymaga minimum :min znaków.',
            'max' => 'Pole wymaga maksymalnie :max znaków.',
            'date_format' => 'Niewłaściwy format daty. Oczekiwany format: DD-MM-YYYY.',
            'before_or_equal' => 'Musisz mieć co najmniej 18 lat, aby się zarejestrować.',
            'regex' => 'Błędny format wprowadzonych danych.',
            'email' => 'Błędny format wprowadzonych danych.',
            'unique' => 'Adres e-mail jest już zajęty.',
            'number' => 'Wybierz prawidłową wartość.',
            'exists' => 'Wybierz prawidłową wartość.',
            'between' => 'Wybierz prawidłową wartość.',
            'file' => 'Pole wymaga pliku.',
            'mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',
            'img_ean.max' => 'Plik nie może być większy niż 4MB.',
        ];
    }
}
