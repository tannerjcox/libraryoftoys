<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StorePageRequest extends BaseRequest
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
            'url' => ['required', 'alpha_dash', Rule::unique('pages')->ignore($this->id)],
            'title' => 'required',
            'page_content' => 'required'
        ];
    }
}
