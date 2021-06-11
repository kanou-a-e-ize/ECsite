<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ProductRequest;

class ProductRequest extends FormRequest
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
            'p_name' => 'required|max:100',
            'p_detail' => 'required|max:255',
            'p_price' => 'required|integer',
            'image1' => 'required|image|dimensions:max_width=920,max_height=920',
            'image2' => 'required|image|dimensions:max_width=920,max_height=920',
            'image3' => 'required|image|dimensions:max_width=920,max_height=920',
          ];
    }
}
