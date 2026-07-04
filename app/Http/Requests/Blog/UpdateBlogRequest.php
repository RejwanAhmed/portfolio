<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title'           => 'required|string|max:255',
            'url'             => 'required|url|max:2048',
            'excerpt'         => 'nullable|string|max:500',
            'cover_image_url' => 'nullable|url|max:2048',
            'published_at'    => 'required|date',
            'is_featured'     => 'boolean',
            'is_visible'      => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Blog title is required.',
            'title.string'   => 'Blog title must be valid text.',
            'title.max'      => 'Blog title may not be greater than 255 characters.',
 
            'url.required' => 'Blog URL is required.',
            'url.url'      => 'Please enter a valid URL.',
            'url.max'      => 'URL may not be greater than 2048 characters.',
 
            'excerpt.string' => 'Excerpt must be valid text.',
            'excerpt.max'    => 'Excerpt may not be greater than 500 characters.',
 
            'cover_image_url.url' => 'Please enter a valid cover image URL.',
            'cover_image_url.max' => 'Cover image URL may not be greater than 2048 characters.',
 
            'published_at.required' => 'Published date is required.',
            'published_at.date'     => 'Please enter a valid date.',
 
            'is_featured.boolean' => 'Featured must be true or false.',
            'is_visible.boolean'  => 'Visible must be true or false.',
        ];
    }
}
