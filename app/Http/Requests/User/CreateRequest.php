<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/u' ],
            'Email' => ['required', 'email','max:255',  Rule::unique('users', 'email')->ignore($this->users)],
            'Password' => ['required', Rules\Password::defaults()],
            'Phone' => ['string', 'max:255'],
            'Address' => ['string', 'max:255' ],
         ];
    }
}
