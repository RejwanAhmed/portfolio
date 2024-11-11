<?php

namespace App\Models;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'image_url',
        'proficiency_level'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
