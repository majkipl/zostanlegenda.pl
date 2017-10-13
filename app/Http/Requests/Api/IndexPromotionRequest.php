<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class IndexPromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'searchable' => 'required|array',
            'searchable.*' => 'in:id,firstname,lastname,birthday,email,phone,address,city,zip,img_receipt,receiptnb,img_ean,category.name,product.name,shop.name,whence.name,created_at,legal_1,legal_2,legal_3,legal_4',
            'offset' => 'nullable|integer|min:0',
            'limit' => 'nullable|integer|min:1|max:100',
            'filter' => 'nullable|json'
        ];
    }

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
