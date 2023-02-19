<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class CreateMenuRequest extends FormRequest
{
    use MenuRequestValidation;

    public function authorize()
    {
        return true;
    }


}


