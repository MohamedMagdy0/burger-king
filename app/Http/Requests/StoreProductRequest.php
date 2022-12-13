<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'unique:products,name|required' ,
            'category'=>'string|required' ,
            'image'=>'mimes:png,jpg,jpeg,svg|required' ,
            'price'=>'numeric|required' ,
            'type'=>'string|required' ,
            'sale_price'=>'numeric|nullable' ,
            'description'=>'string|nullable|between:3,500' ,
            'quantity'=>'string|nullable|' ,
        ];
    }
}
