<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CateGoryRequest extends Request
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
        $id = $this->route('category');
        return [
            'category_name' => "unique:category,category_name,".$id,
        ];
    }
}
