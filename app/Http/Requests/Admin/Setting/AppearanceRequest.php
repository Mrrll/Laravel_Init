<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class AppearanceRequest extends FormRequest
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
            'theme' => 'string|in:peyra,dark,light',
            'logo' => 'image|mimes:png',
            'user_id' => 'required|integer'
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
     * The function returns an array of attributes including the theme and logo, with their values
     * being the lowercase version of their corresponding language translations.
     *
     * @return An array with two key-value pairs. The first key is "theme" and the value is the
     * lowercase translation of the string "Theme" using the Laravel Lang facade. The second key is
     * "logo" and the value is the lowercase translation of the string "Logo" using the Laravel Lang
     * facade.
     */
    public function attributes()
    {
        return [
            "theme" => strtolower(Lang::get('Theme')),
            "logo" => strtolower(Lang::get('Logo')),
        ];
    }
}
