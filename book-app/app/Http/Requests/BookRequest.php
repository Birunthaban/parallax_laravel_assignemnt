<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => [
                'required',
                'numeric',
                'regex:/^-?\d+(\.\d{1,2})?$/',
                'min:0.01',
            ],
            'stock' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'author.required' => 'The author is required.',
            'price.required' => 'The price is required.',
            'price.regex' => 'The price must have up to two decimal places and cannot be negative.',
            // Add custom messages for other fields as needed...
        ];
    }
}
