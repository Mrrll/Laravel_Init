<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ProfileRequest extends FormRequest
{
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
            "first_name" => "required|string",
            "second_name" => "nullable|string",
            "identify" => ['required', 'regex:/^([a-zA-Z]{1}\d{7}[a-jA-J0-9]{1}|[XYZ]?\d{5,8}[A-Z]{1})$/'],
            "country" => "required|string",
            "city" => "required|string",
            "municipality" => "required|string",
            "address" => "required|string",
            "first_phone" => "required|numeric",
            "second_phone" => "nullable|numeric",
            "user_id" => 'required|integer',
            "avatar" => 'image|mimes:png',
        ];
    }
    /**
     * Prepare the data for validation.
     */
    /**
     * This function sets the user_id field to the authenticated user's id before validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    /**
     * The function returns an array of lowercase attribute names with their corresponding translated
     * values.
     *
     * @return An array of attribute names where each attribute name is a lowercase version of the
     * corresponding translated string obtained using the Laravel Lang facade. The attribute names are
     * "first_name", "second_name", "identify", "country", "city", "municipality", "address",
     * "first_phone", and "second_phone".
     */
    public function attributes()
    {
        return [
            "first_name" => strtolower(Lang::get('First Name')),
            "second_name" => strtolower(Lang::get('Second Name')),
            "identify" => strtolower(Lang::get('Identity')),
            "country" => strtolower(Lang::get('Country')),
            "city" => strtolower(Lang::get('City')),
            "municipality" => strtolower(Lang::get('Municipality')),
            "address" => strtolower(Lang::get('Address')),
            "first_phone" => strtolower(Lang::get('First phone')),
            "second_phone" => strtolower(Lang::get('Second phone')),
        ];
    }
}
