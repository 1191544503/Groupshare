<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                    'name'=>'required|min:1|max:20',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'       => 'min:1|max:20',
                    'describe'        => 'max:500',
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
    public function messages()
    {
        return [
            'name.max' => '小组必须最多20个字符',
            'name.min' => '小组必须最少1个字符',
            'describe.max'=>'小组简介最多500字符',
        ];
    }
}
