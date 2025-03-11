<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'github_url' => 'nullable|url|max:255',
            'live_link_url' => 'nullable|url|max:255',
            'skills' => 'nullable|array'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Project name is required.',
            'name.string' => 'Project name must be a valid string.',
            'name.max' => 'Project name may not exceed 255 characters.',

            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a valid string.',
            'description.max' => 'Description may not exceed 1000 characters.',

            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Start date must be a valid date.',

            'end_date.required' => 'End date is required.',
            'end_date.date' => 'End date must be a valid date.',
            'end_date.after' => 'End date must be after the start date.',

            'github_url.url' => 'GitHub URL must be a valid URL.',
            'github_url.max' => 'GitHub URL may not exceed 255 characters.',

            'live_link_url.url' => 'Live Link URL must be a valid URL.',
            'live_link_url.max' => 'Live Link URL may not exceed 255 characters.',

            'skills.array' => 'Skills must be in array format'
        ];
    }
}
