<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
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
            'title' => ['required', 'max:100', new Uppercase],
            'content' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('message.title_blank'),
            'title.max' => 'Title must be less than 100 characters',
            'content.required'  => __('message.content_blank'),
            'content.max'  => 'Content must be less than 1000 characters',
        ];
    }
}
