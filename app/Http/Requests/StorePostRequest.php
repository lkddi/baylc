<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'nickname' => 'required|unique:zt_stores,nickname'
        ];
    }
    public function messages()
    {
        return [
            'id.required' =>'id必须',
            'nickname.required' => '简称为必填',
            'nickname.unique' => '该简称已经存在！',
        ];
    }
}
