<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
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
        $skillId = $this->route('skill')->id;
        return [
            'name' => 'required|string|unique:skills,name,'.$skillId,
            'proficiency_level' => 'required|integer|min:1|max:100',
            // 'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:1048'
            // 'image_url' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:width=60,height=60|max:1048'
            'image_url' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Allow URL or file
                    if ( !$value instanceof \Illuminate\Http\UploadedFile && !is_string($value)) {
                        $fail('The image must be a valid file or URL.');
                    }
                },
                'sometimes',
                function ($attribute, $value, $fail) {
                    if ($value instanceof \Illuminate\Http\UploadedFile) {
                        $validator = \Validator::make(
                            [$attribute => $value],
                            ['image_url' => 'image|mimes:jpg,jpeg,png|max:1048']
                        );
            
                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }
                },
            ],
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
        ];
    }
}
