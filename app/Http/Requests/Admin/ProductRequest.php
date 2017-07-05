<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'id'       => [
                'numeric',
            ],
            'category_id'=>[
                'numeric',
            ],
            'img_id'   => [
                'numeric',
            ],
            'p_name'   => [
                'required',
                'min:3',
            ],
            'p_num'    => [
                'alpha_dash',
            ],
            'price'    => [
                'numeric',
            ],
            'store'   =>[
                'required',
                'integer',
                'min:1'
            ],
            'status'   => [
                'required',
            ],
            'recommend'=>[
                'required',
                'in:0,1',
            ],
            'flag' =>[
                'string'
            ],
            'summary'=>[
                'string',
            ],
            'is_free_shipping'=>[
                'in:0,1',
            ]
        ];
    }
}
