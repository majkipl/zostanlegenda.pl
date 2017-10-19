<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class IndexContestRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'searchable' => 'required|array',
            'searchable.*' => 'in:id,firstname,lastname,birthday,email,title,message,img_tip,video_url,video_type,video_id,video_image_id,whence.name,legal_1,legal_2,legal_3,legal_4',
            'offset' => 'nullable|integer|min:0',
            'limit' => 'nullable|integer|min:1|max:100',
            'filter' => 'nullable|json',
            'sort' => 'nullable|in:id,firstname,lastname,birthday,email,title,message,img_tip,video_url,video_type,video_id,video_image_id,whence.name,legal_1,legal_2,legal_3,legal_4',
            'order' => 'nullable|in:asc,desc',
            'search' => 'nullable'
        ];
    }

    /**
     * @param $validator
     * @return void
     */
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

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'The given data was invalid',
            'errors' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
