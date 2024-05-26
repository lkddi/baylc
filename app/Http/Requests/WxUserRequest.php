<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WxUserRequest extends FormRequest
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
//                'store' => 'required',
                'nostoremsg' => 'required|boolean',
                'id' => 'required|integer'
//            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'store.required' =>'门店编号必须',
//            'nostoremsg.required' => '提成必填',
            'id.integer' => 'ID必须为数字',
            'id.required' => 'ID为必须',
        ];
    }
}
