<?php

namespace App\Http\Requests\Tempate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateRequest extends FormRequest
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
        $id = $this->route('template')->id;
        return [
            'name'          => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:templates,slug,' . $id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Template name is required.',
            'name.string'   => 'Template name must be a string.',
            'name.max'      => 'Template name must not exceed 255 characters.',
            'slug.required' => 'Slug is required.',
            'slug.string'   => 'Slug must be a string.',
            'slug.max'      => 'Slug must not exceed 255 characters.',
            'slug.unique'   => 'This slug is already taken. Please choose a different one.',
        ];
    }
}
