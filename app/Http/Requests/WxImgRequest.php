<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WxImgRequest extends FormRequest
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
            'store' => ['required'],
            'user' => ['required'],
//            'students' => ['required|array'],
            'students.*.model' => ['required'],
            'students.*.num' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' =>'id必须',
            'store.required' => '门店必填',
            'id.integer' => 'id必须为数字',
            'students.*.model.required' => '产品型号必填',
            'students.*.num.required' => '提成必填',
            'students.*.num.integer' => '提成为数字',
        ];
    }
}
