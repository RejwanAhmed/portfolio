<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class CreateEducationRequest extends FormRequest
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
            'serial_no' => 'required|integer|min:1|unique:education,serial_no',
            'title' => 'required|string|unique:education,title',
            'institution' => 'required|string',
            'board' => 'nullable|string',
            'result' => 'required|string',
            'start_year' => 'required|digits:4|integer|before_or_equal:end_year',
            'end_year' => 'required|digits:4|integer|after_or_equal:start_year',
            'held_on_year' => 'nullable|digits:4|integer',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:1048',
        ];
    }

    public function messages(): array
    {
        return [
            'serial_no.required' => 'The serial number is required.',
            'serial_no.integer' => 'The serial number must be a valid integer.',
            'serial_no.min' => 'The serial number must be at least 1.',
            'serial_no.unique' => 'The serial number has already been taken.',

            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a valid string.',
            'title.unique' => 'The title has already been taken.',

            'institution.required' => 'The institution name is required.',
            'institution.string' => 'The institution name must be a valid string.',

            'board.string' => 'The board name must be a valid string.',

            'result.required' => 'The result is required.',
            'result.string' => 'The result must be a valid string.',

            'start_year.required' => 'The start year is required.',
            'start_year.digits' => 'The start year must be a 4-digit number.',
            'start_year.integer' => 'The start year must be an integer.',
            'start_year.before_or_equal' => 'The start year must be before or equal to the end year.',

            'end_year.required' => 'The end year is required.',
            'end_year.digits' => 'The end year must be a 4-digit number.',
            'end_year.integer' => 'The end year must be an integer.',
            'end_year.after_or_equal' => 'The end year must be after or equal to the start year.',

            'held_on_year.digits' => 'The held-on year must be a 4-digit number.',
            'held_on_year.integer' => 'The held-on year must be an integer.',

            'logo.required' => 'The logo is required',
            'logo.image' => 'The file must be an image.',
            'logo.mimes' => 'The logo must be a JPG, JPEG, or PNG file.',
            'logo.max' => 'The logo size must not exceed 1MB (1024 KB).',
        ];
    }
}
