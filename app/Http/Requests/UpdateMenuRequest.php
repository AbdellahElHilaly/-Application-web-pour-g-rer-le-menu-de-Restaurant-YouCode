<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    use MenuRequestValidation;

    public function authorize()
    {
        return true;
    }
}

