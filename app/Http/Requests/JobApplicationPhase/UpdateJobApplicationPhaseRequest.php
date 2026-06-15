<?php

namespace App\Http\Requests\JobApplicationPhase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobApplicationPhaseRequest extends FormRequest
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
            'phase_name'   => 'required|string|max:255',
            'scheduled_at' => 'required|date',
            'outcome'      => 'required|in:pending,passed,failed',
            'notes'        => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'phase_name.required' => 'Phase name is required.',
            'phase_name.string' => 'Phase name must be a valid text.',
            'phase_name.max' => 'Phase name may not be greater than 255 characters.',

            'scheduled_at.required' => 'Scheduled date is required.',
            'scheduled_at.date' => 'Please enter a valid date.',

            'outcome.required' => 'Please select a outcome.',
            'status.in' => 'The selected outcome is invalid.',
            
            'notes.string' => 'Notes must be valid text.',
        ];
    }
}
