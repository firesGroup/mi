<?php


namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AdminMenuGroupRequest extends Request
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
            'group_id'=>[
                'int'
            ],
            'menu_group_name'=>[
                'required',
                'unique:admin_menu_group'
            ]
        ];
    }
}