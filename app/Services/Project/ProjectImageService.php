<?php

namespace App\Services\Project;

use App\Models\Project\ProjectImage;
use App\Services\Core\BaseModelService;

class ProjectImageService extends BaseModelService
{
    public function model(): string 
    {
        return ProjectImage::class;
    }
}