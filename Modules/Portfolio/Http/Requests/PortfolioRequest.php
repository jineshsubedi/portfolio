<?php

namespace Modules\Portfolio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'address' => ['sometimes', 'nullable', 'string'],
            'phone' => ['sometimes', 'nullable', 'string'],
            'cv_file' => ['sometimes', 'nullable', 'mimes:doc,docx,pdf', 'max:2048'],
            'cover_letter_file' => ['sometimes', 'nullable', 'mimes:doc,docx,pdf', 'max:2048'],
            'facebook' => ['sometimes', 'nullable', 'string'],
            'linkedin' => ['sometimes', 'nullable', 'string'],
            'youtube' => ['sometimes', 'nullable', 'string'],
            'bio' => ['sometimes', 'nullable', 'string', 'max:250'],
            'status' => ['required', 'in:0,1']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
