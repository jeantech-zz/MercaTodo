<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255' ],
            'description' => ['required', 'string', 'max:255' ],
            'price' => ['required', 'string', 'max:255' ],
            'image' => ['required', 'string', 'max:255' ],
        ];
    }
}
