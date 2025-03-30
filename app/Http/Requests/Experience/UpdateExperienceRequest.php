<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
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
            'company_name' => 'required',
            'job_title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => 'Company name is required.',
            'job_title.required' => 'Job title is required',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Start date must be a valid dated',
            'end_date.date' => 'End date must be a valid date',
            'end_date.after' => 'End date must be after start date',
            'description.required' => 'Description is required'
        ];
    }
}
