<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileOtherInformationUpdateRequest extends FormRequest
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
            'phone' => 'required|digits:11',
            'address' => 'required|string',
            'linked_in_url' => 'required|regex:/^https:\/\/(www\.)?linkedin\.com\/.*$/i',
            'github_url' => 'required|regex:/^https:\/\/(www\.)?github\.com\/.*$/i',
            'short_description' => 'required',
            'long_description' => 'required',
            'about_me_image_url' => [
                'required',
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
                            ['about_me_image_url' => 'image|mimes:jpg,jpeg,png|max:1048']
                        );
            
                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }
                },
            ],
            'landing_image_url' => [
                'required',
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
                            ['landing_image_url' => 'image|mimes:jpg,jpeg,png|max:1048']
                        );
            
                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }
                },
            ]
        ];
    }
}
