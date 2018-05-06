<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    'name'=>'required|min:3|string',
                    'introduce'=>'required|min:3|string'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'=>'required|min:3|string',
                    'introduce'=>'required|min:3|string'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }
    public function messages(){
        return [
            'name.required'=>'名字与其他资源重复',
            'name.min'=>'名字最小3个字符',
            'introduce.min'=>'介绍最小3个字符',
        ];
    }
}
