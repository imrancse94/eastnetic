<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ApiResponseTrait;

class BaseRequest extends FormRequest
{
    use ApiResponseTrait;
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
            //
        ];
    }

    protected function passedValidation()
    {
        $request = $this->all();
        $rules = array_keys($this->rules());
        $final_data = [];
        if (!empty($rules)) {
            foreach ($rules as $rule) {
                if (isset($request[$rule])) {
                    $final_data[$rule] = $request[$rule];
                }
            }
        }

        $this->replace($final_data);
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();
        $errorData = [];
        if (!empty($errors)) {
            foreach ($errors as $key => $err) {
                $errorData[$key] = current($err);
            }
        }
        throw new HttpResponseException($this->sendError("validation error", $errorData, config('constant.VALIDATION_ERROR')));
    }
}
