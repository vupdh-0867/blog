<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'content' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'title.max' => 'Title must be less than 100 characters',
            'content.required'  => 'Please enter content',
            'content.max'  => 'Content must be less than 1000 characters',
        ];
    }
}
