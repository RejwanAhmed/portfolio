<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'url',
        'excerpt',
        'cover_image_url',
        'published_at',
        'is_featured',
        'is_visible',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'is_visible'   => 'boolean',
    ];
}
