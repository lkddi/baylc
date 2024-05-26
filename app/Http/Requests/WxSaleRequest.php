<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WxSaleRequest extends FormRequest
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
            'model' => 'required',
            'ticheng' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'model.required' =>'型号必须',
            'ticheng.required' => '提成必填',
            'ticheng.integer' => '提成必须为数字',
        ];
    }
}
