<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class IndexShopRequest extends FormRequest
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
//    public function all($keys = null)
//    {
//        $data = parent::all($keys);
//
//        // Jeśli parametr sort nie jest ustawiony lub jest pusty, ustaw domyślną wartość
//        if (!isset($data['sort']) || empty($data['sort'])) {
//            $data['sort'] = 'id'; // Ustaw tu swoją domyślną wartość dla sortowania
//        }
//
//        // Jeśli parametr order nie jest ustawiony lub jest pusty, ustaw domyślną wartość
//        if (!isset($data['order']) || empty($data['order'])) {
//            $data['order'] = 'asc'; // Ustaw tu swoją domyślną wartość dla kierunku sortowania
//        }
//
//        return $data;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'searchable' => 'required|array',
            'searchable.*' => 'in:id,name,slug',
            'offset' => 'nullable|integer|min:0',
            'limit' => 'nullable|integer|min:1|max:100',
            'filter' => 'nullable|json',
            'sort' => 'nullable|in:id,name,slug',
            'order' => 'nullable|in:asc,desc',
            'search' => 'nullable'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (empty($this->input('sort'))) {
                $this->merge(['sort' => 'id']); // Domyślna kolumna sortowania
            }

            if (empty($this->input('order'))) {
                $this->merge(['order' => 'asc']); // Domyślny kierunek sortowania
            }
        });
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid',
            'errors' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
