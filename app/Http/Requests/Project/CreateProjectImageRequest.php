<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectImageRequest extends FormRequest
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
            'image_url' => 'required|file|mimes:jpg,jpeg,png|max:1048',
        ];
    }

    public function messages(): array
    {
        return [
            'image_url.required' => 'Image is required.',
            'image_url.file' => 'Uploaded image is invalid.',    
            'image_url.mimes' => 'Image must be a type of: png, jpg, jpeg.',
            'image_url.max' => 'Image size must not exceed 1MB (1048KB).',
        ];
    }
}
