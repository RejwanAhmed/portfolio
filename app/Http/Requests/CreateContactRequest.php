<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',

            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',

            'subject.string' => 'Subject must be string',
            'subject.max' => 'Subject can not exceed 255 characters',

            'message.required' => 'Message is required',
            'message.string' => 'Message must be string',
            'message.max' => 'Message can not exceed 5000 characters',
        ];
    }
}
