<?php 

namespace App\Services\Project;

use App\Models\Project\Project;
use App\Services\Core\BaseModelService;

class ProjectService extends BaseModelService
{
    public function model(): string
    {
        return Project::class;
    }
}