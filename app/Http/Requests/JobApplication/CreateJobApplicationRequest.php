<?php

namespace App\Http\Requests\JobApplication;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobApplicationRequest extends FormRequest
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
            'cv_id' => 'nullable|exists:cvs,id',
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'job_url' => 'nullable|url',
            'source' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary_min' => 'nullable|integer|min:0',
            'salary_max' => 'nullable|integer|min:0|gte:salary_min',
            'status' => 'required|in:saved,applied,offer,accepted,rejected,withdrawn',
            'application_date' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'cv_id.exists' => 'The selected CV does not exist.',

            'company_name.required' => 'Company name is required.',
            'company_name.string' => 'Company name must be a valid text.',
            'company_name.max' => 'Company name may not be greater than 255 characters.',

            'title.required' => 'Job title is required.',
            'title.string' => 'Job title must be a valid text.',
            'title.max' => 'Job title may not be greater than 255 characters.',

            'job_url.url' => 'Please enter a valid job URL.',
            'job_url.max' => 'Job URL may not be greater than 255 characters.',

            'source.string' => 'Source must be valid text.',
            'source.max' => 'Source may not be greater than 255 characters.',

            'location.string' => 'Location must be valid text.',
            'location.max' => 'Location may not be greater than 255 characters.',

            'salary_min.integer' => 'Minimum salary must be a number.',
            'salary_min.min' => 'Minimum salary cannot be negative.',

            'salary_max.integer' => 'Maximum salary must be a number.',
            'salary_max.min' => 'Maximum salary cannot be negative.',
            'salary_max.gte' => 'Maximum salary must be greater than or equal to minimum salary.',

            'status.required' => 'Please select a status.',
            'status.in' => 'The selected status is invalid.',

            'application_date.date' => 'Please enter a valid application date.',
            'description.string' => 'Description must be valid text.',
        ];
    }
}
