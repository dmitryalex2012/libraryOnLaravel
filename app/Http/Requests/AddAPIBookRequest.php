<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAPIBookRequest extends FormRequest
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
            'id' => 'required|numeric|unique:App\Book,id',
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'book_cover' => 'required|max:2048',
            'category' => 'required|string',
            'language' => 'required|string',
            'publishing_year' => 'required|numeric',
            'created_at' => 'required|date'
        ];
    }
}
