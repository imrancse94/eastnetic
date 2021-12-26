<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class OrderEditRequest extends BaseRequest
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
        $rule['order_status'] = [
            'integer',
            Rule::in($this->order_status_types()),
        ];

        if (auth()->user()->user_type != config('constant.ADMIN_USER_TYPE')) {
            $rule['qty'] = [
                'required',
                'integer',
                'gt:0'
            ];
        }

        return $rule;
    }


    private function order_status_types()
    {

        $status_array = [];

        if (auth()->user()->user_type == config('constant.ADMIN_USER_TYPE')) {
            $status_array[] = config('constant.ORDER_PENDING');
            $status_array[] = config('constant.ORDER_APPROVED');
            $status_array[] = config('constant.ORDER_REJECTED');
            $status_array[] = config('constant.ORDER_PROCESSING');
            $status_array[] = config('constant.ORDER_SHIPPED');
            $status_array[] = config('constant.ORDER_DELIVERED');
        } else {
            $status_array[] = config('constant.ORDER_PENDING');
            $status_array[] = config('constant.ORDER_CANCELED');
        }

        return $status_array;
    }
}
