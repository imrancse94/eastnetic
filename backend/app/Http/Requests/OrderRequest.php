<?php

namespace App\Http\Requests;

class OrderRequest extends BaseRequest
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
            'product_id'=>[
                'required',
                'integer',
                'gt:0'            
            ],

            'qty'=>[
                'required',
                'integer',
                'gt:0'
            ]
        ];
    }

    
    
}
