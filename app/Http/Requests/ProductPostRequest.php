<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => 'required|unique:zt_products,model',
            'title' => 'required|unique:zt_products,title|regex:/[-+]/'
        ];
    }
    public function messages()
    {
        return [
            'model.required' =>'简称必须',
            'title.required' => '全称必填',
            'model.unique' => '该简称已经存在！',
            'title.unique' => '该型号已经存在！',
            'title.regex' => '全称必须包含一个 "-" 或 "+" 符号',
        ];
    }
}
