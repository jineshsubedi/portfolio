<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'logoFile' => ['sometimes', 'nullable', 'mimes:jpg,png,jpeg','max:2048'],
            'faviconFile' => ['sometimes', 'nullable', 'mimes:jpg,png,jpeg','max:2048'],
            'meta_title' => ['sometimes', 'nullable'],
            'meta_keyword' => ['sometimes', 'nullable'],
            'meta_description' => ['sometimes', 'nullable'],
            'google_analytics' => ['sometimes', 'nullable'],
        ];
    }
}
