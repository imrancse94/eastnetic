<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Rules\ImageValidationRule;
class ProductRequest extends BaseRequest
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
            'name'=>[
                'required',
                Rule::unique('products','name')->ignore(request('id'))
            ],
            'qty'=>'required|integer|gt:0',
            'unit_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'=>[
                'mimes:jpg,jpeg,png',
                new ImageValidationRule(256,256)
            ]
        ];
    }
}
