<?php

namespace App\Http\Controllers\Project;

use App\Constants\Constants;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project\Project;
use App\Services\SkillService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Project\ProjectService;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Project\CreateProjectRequest;

class ProjectController extends Controller
{
    protected ProjectService $projectService;
    protected SkillService $skillService;

    public function __construct(ProjectService $projectService, SkillService $skillService)
    {
        $this->projectService = $projectService;
        $this->skillService = $skillService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('projects');
        $projects = $this->projectService->all();
        $responseData = [
            'projects' => $projects,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Project List',
        ];
        return Inertia::render('Project/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addProject');
        $skills = $this->skillService->all();
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'activeSkills' => $skills,
            'pageTitle' => 'Add Project',
        ];
        return Inertia::render('Project/Create', $responseData);
    }

    public function store(CreateProjectRequest $request)
    {
        $validatedData = $request->validated();
        $project = $this->projectService->createProject($validatedData);
        $status = $project ? Constants::SUCCESS : Constants::ERROR;
        $message = $project ? 'Project Created Successfully' : 'Project Could Not Be Created';
        return Redirect::route('projects.index')->with($status, $message);
    }

    public function edit(Project $project)
    {
        $breadcrumbs = Breadcrumbs::generate('editProject', $project);
        $project = $this->projectService->getProjectDetails($project);
        $skills = $this->skillService->all();
        $responseData = [
            'project' => $project,
            'activeSkills' => $skills,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Project'
        ];
        return Inertia::render('Project/Create', $responseData);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();
        $isUpdated = $this->projectService->updateProject($project, $validatedData);
        $status = $isUpdated ? Constants::SUCCESS : Constants::ERROR;
        $message = $isUpdated ? 'Project Updated Successfully' : 'Project Could Not Be Updated';
        return Redirect::route('projects.index')->with($status, $message);
    }

    public function destroy(Project $project)
    {
        $isDeleted = $this->projectService->delete($project->id);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Project Deleted Successfully' : 'Project Could Not Be Deleted';
        return Redirect::route('projects.index')->with($status, $message);
    }
}
