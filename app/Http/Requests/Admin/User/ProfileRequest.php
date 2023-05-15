<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

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
}
