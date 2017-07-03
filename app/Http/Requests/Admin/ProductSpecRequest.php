<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductSpecRequest extends Request
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
            'spec_name'=>[
                'unique:product_spec'
            ],
            'model_id'=>[
                'numeric'
            ],
            'spec_item'=>[
                'required'
            ]
        ];
    }
}
