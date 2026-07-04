<?php 

namespace App\Services;

use App\Models\Blog;
use App\Services\Core\BaseModelService;

class BlogService extends BaseModelService
{
    public function model(): string 
    {
        return Blog::class;
    }

    public function toggle(Blog $blog, $validatedData): bool
    {
        $field = $validatedData['field'];
        return $blog->update([$field => !$blog->$field]);
    }
}