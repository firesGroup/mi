<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LevelRequest extends Request
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
        $id = $this->route('level');
        return [
            'level_name' => "unique:level,level_name,".$id,
            'consumption' => "min:2|max:10",
            'discount' => 'max:2',
        ];
    }
}
