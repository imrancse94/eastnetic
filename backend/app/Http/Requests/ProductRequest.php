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
        $rule = [
            'name'=>[
                'required',
                Rule::unique('products','name')->ignore(request('id'))
            ],
            'description'=>'required',
            'qty'=>'required|integer|gt:0',
            'unit_price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];

        if(!empty(request('image'))){
            $rule['image']=[
                'required',
                new ImageValidationRule(500,500)
            ];
        }
        
        return $rule;
    }

    public function messages()
    {
        return [
            'qty.required'=>"Stock quantity required"
        ];
    }
}
