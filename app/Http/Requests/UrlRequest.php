<?php

namespace App\Http\Requests;

use App\Rules\SafeUrlChecker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UrlRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => [
                'required',
                'url',
                'unique:links,url',
                new SafeUrlChecker(),
            ]
        ];
    }

    public function messages()
    {
        return [
            'url.unique' => 'URL is already in use',
        ];
    }
}
