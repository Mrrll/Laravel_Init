<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class LoginRequest extends FormRequest
{
    protected $errorBag = 'login';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'string'
        ];
    }

    /**
     * The function returns an array of attributes with their corresponding lowercase translations.
     *
     * @return An array of attributes with keys "Email" and "Password" and their corresponding values
     * obtained by converting the language strings "Email" and "Password" to lowercase using the Lang
     * facade.
     */
    public function attributes()
    {
        return [
            "email" => strtolower(Lang::get('Email')),
            "password" => strtolower(Lang::get('Password')),
        ];
    }
}
