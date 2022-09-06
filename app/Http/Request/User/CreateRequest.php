<?php

namespace App\Http\Request\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return[
            'account_name' => ['required', 'string', 'max:20'],
            'user_name' => ['required', 'unique:users,user_name', 'max:20', 'regex:/^@\w*/'],
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'alpha_num', Password::min(8)],
        ];
    }
}
