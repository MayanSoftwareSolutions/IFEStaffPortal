<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    
    public function authorize()
    {
        return Gate::allows('user_access');
    }

    
    public function rules()
    {
        return [
            
            'name'     => [
                'string',
                'required',
            ],
            'email'    => [
                'required',
                'unique:users',
            ],
            'job_title'    => [
                'string',
                'required',
            ],
            'department'    => [
                'string',
                'required',
            ],
            'organisation'    => [
                'string',
                'required',
            ],
            'password' => [
                'string',
                'required',
            ],
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
    
        ];
    }
}
