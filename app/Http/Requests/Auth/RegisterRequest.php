<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class RegisterRequest extends FormRequest
{
    protected $errorBag = 'register';
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            "name" => strtolower(Lang::get('Name')),
            "email" => strtolower(Lang::get('Email')),
            "password" => strtolower(Lang::get('Password')),
            "password_confirmation" => strtolower(Lang::get('Password Confirmation')),
        ];
    }
}
