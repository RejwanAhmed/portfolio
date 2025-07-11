<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCvRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'File is required',
            'file.file' => 'Uploaded file is invalid',
            'file.mimes' => 'Only pdf format is allowed',
        ];
    }
}
