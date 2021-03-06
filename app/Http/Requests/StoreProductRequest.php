<?php

namespace App\Http\Requests;

class StoreProductRequest extends BaseRequest
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
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'images' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Please provide a :attribute.',
            'images.required' => 'At least one image is required.',
        ];
    }
}
