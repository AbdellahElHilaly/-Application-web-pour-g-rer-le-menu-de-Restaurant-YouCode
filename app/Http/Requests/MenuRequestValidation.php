<?php

namespace App\Http\Requests;

trait MenuRequestValidation
{
    public function rules()
    {
        return [
            'name' => 'required|String|min:3|max:15',
            'description' => 'required|String',
            'category_id' => 'required|integer',
            'price' => [
                'required',
                'numeric',
                'regex:/^\d{0,8}(\.\d{0,2})?$/',
            ],
            'image' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.min' => 'The name field must be at least 3 characters.',
            'name.max' => 'The name field may not be greater than 15 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description field must be a string.',
            'category_id.required' => 'The category ID field is required.',
            'category_id.integer' => 'The category ID field must be an integer.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'price.regex' => 'The price field must have up to 2 decimal places.',
            'image.required' => 'The image field is required.'
        ];
    }

}
