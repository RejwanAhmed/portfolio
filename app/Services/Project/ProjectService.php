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

    public function createProject($validatedData)
    {
        $project = $this->create($validatedData);
        if (!empty($validatedData['skills'])) {
            $this->syncSkills($project, $validatedData['skills']);
        }
        return $project;
    }

    public function updateProject(Project $project, $validatedData)
    {
        $this->update($project, $validatedData);
        $this->syncSkills($project, $validatedData['skills']);
        return $project;
    }

    public function getProjectDetails(Project $project)
    {
        return $project->load('skills');
    }

    public function syncSkills(Project $project, $skills)
    {
        $skillIds = collect($skills)->pluck('id')->toArray();
        return $project->skills()->sync($skillIds);
    }
}