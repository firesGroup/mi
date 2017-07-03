<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MemberRequest extends Request
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

        $id = $this->route('member'); //获取当前需要排除的id,这里的 member 是 路由 {} 中的参数
        return [
            'email' => "required|email|unique:member,email,".$id,
            'phone' => "required|phone|unique:member,phone,".$id,
            'nick_name' => "required|unique:member,nick_name,".$id
        ];
    }
}