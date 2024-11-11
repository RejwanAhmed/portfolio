<?php

namespace App\Models\Project;

use App\Models\Skill;
use App\Models\Project\ProjectImage;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'github_url',
        'live_link_url'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
