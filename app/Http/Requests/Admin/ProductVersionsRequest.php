<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductVersionsRequest extends Request
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
            'ver_name'=>[
                'required'
            ],
            'ver_spec'=>[
                'required'
            ],
            'ver_desc'=>[
                'required'
            ],
            'price'=>[
                'required',
                'numeric'
            ],
            'store'=>[
                'required',
                'numeric'
            ]
        ];
    }
}
