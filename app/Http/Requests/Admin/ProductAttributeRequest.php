<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductAttributeRequest extends Request
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
            'attr_name'=>[
                'required',
                'unique:product_attribute'
            ],
            'model_id'=>[
                'numeric'
            ],
            'attr_input_type'=>[
                'required',
                'numeric',
                'in:0,1'
            ]
        ];
    }
}
