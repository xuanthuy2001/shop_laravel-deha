<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'display_name' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'trường :attribute không được để trống',
            'display_name.required' => 'trường :attribute không được để trống',
        ];
    }
}