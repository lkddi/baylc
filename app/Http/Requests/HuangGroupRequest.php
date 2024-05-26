<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HuangGroupRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'num' => ['required'],
//            'students' => ['required|array'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' =>'id必须',
            'num.required' => '跑步公里数',
            'id.integer' => 'id必须为数字',
        ];
    }
}
