<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'c_name' => 'required|max:100',
            'c_name_kana' => 'required|string|regex:/^[ァ-ヾ　〜ー]+$/u|max:100',
            'postcode' => 'required|integer|digits:7',
            'prefecture' => 'required|max:100',
            'city' => 'required|max:100',
            'street' => 'required|max:100',
            'c_phone' => 'integer|digits_between:8,11',
            'c_mail' => 'required|email|max:100',
        ];
    }
}
