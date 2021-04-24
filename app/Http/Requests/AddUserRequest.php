<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'id' => 'required|numeric|unique:App\User,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:App\User,email',
            'password' => 'required|between:8,64',
            'created_at' => 'required|date'
        ];
    }
}