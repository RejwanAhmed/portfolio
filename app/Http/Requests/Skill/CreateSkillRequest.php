<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class CreateSkillRequest extends FormRequest
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
            'name' => 'required|string|unique:skills,name',
            'proficiency_level' => 'required|integer|min:1|max:100',
            'image_url' => 'required|image|mimes:jpg,jpeg,png|max:1048'
            // 'image_url' => 'required|image|mimes:jpg,jpeg,png|dimensions:width=60,height=60|max:1048'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Skill name is required.',
            'name.string' => 'Skill name must be a string.',
            'name.unique' => 'Skill name must be unique.',

            'proficiency_level.required' => 'Proficiency level is required.',
            'proficiency_level.integer' =>  'Proficiency level must be an integer.',
            'proficiency_level.min' => 'Proficiency level must be greater than 0.',
            'proficiency_level.max' => 'Proficiency level cannot exceed 100.',

            'image_url.required' => 'Skill image is required.',
            'image_url.image' => 'Uploaded file must be an image.',
            'image_url.mimes' => 'Image must be a file of type: png, jpg, jpeg.',
            'image_url.dimensions' => 'Image must be exactly 60x60 pixels.',
            'image_url.max' => 'Image size must not exceed 1MB (1048KB).',
        ];
    }
}
