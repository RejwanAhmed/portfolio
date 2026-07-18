<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Http\Requests\Tempate\CreateTemplateRequest;
use App\Http\Requests\Tempate\UpdateTemplateRequest;
use App\Models\Template;
use App\Services\TemplateService;
use App\Services\UserService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Services\BlogService;
use App\Services\CvService;
use App\Services\EducationService;
use App\Services\ExperienceService;
use App\Services\Project\ProjectService;
use App\Services\SkillService;

class TemplateController extends Controller
{
    protected TemplateService $templateService;
    protected SkillService $skillService;
    protected EducationService $educationService;
    protected ProjectService $projectService;
    protected ExperienceService $experienceService;
    protected CvService $cvService;
    protected BlogService $blogService;
    protected UserService $userService;
    
    public function __construct(SkillService $skillService, EducationService $educationService, ProjectService $projectService, ExperienceService $experienceService, CvService $cvService, BlogService $blogService, TemplateService $templateService, UserService $userService)
    {
        $this->skillService = $skillService;
        $this->educationService = $educationService;
        $this->projectService = $projectService;
        $this->experienceService = $experienceService;
        $this->cvService = $cvService;
        $this->blogService = $blogService;
        $this->templateService = $templateService;
        $this->userService = $userService;
    }

    public function index()
    {
        $templates = $this->templateService->all();
        $breadcrumbs = Breadcrumbs::generate('templates');
        $responseData = [
            'templates' => $templates,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Template List'
        ];

        return Inertia::render('Template/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addTemplate');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Add Template',
        ];

        return Inertia::render('Template/Create', $responseData);
    }

    public function store(CreateTemplateRequest $request)
    {
        $validatedData = $request->validated();
        $template = $this->templateService->create($validatedData);
        $status = $template ? Constants::SUCCESS : Constants::ERROR;
        $message = $template ? 'Template created successfully' : 'Template could not be created';
        return Redirect::route('templates.index')->with($status, $message);
    }

    public function edit(Template $template)
    {
        $breadcrumbs = Breadcrumbs::generate('editTemplate', $template);
        $responseData = [
            'template' => $template,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Template'
        ];
        
        return Inertia::render('Template/Create', $responseData);
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $validatedData = $request->validated();
        $isUpdated = $this->templateService->update($template, $validatedData);
        $status = $isUpdated ? Constants::SUCCESS : Constants::ERROR;
        $message = $isUpdated ? 'Template updated successfully' : 'Template could not be updated';
        return Redirect::route('templates.index')->with($status, $message);
    }

    public function show(Template $template)
    {
        $breadcrumbs = Breadcrumbs::generate('viewTemplate', $template);
        $responseData = [
            'template' => $template,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Template Details'
        ];
        
        return Inertia::render('Template/Show', $responseData);
    }

    public function destroy(Template $template)
    {
        $isDeleted = $this->templateService->delete($template->id);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Template deleted successfully' : 'Template could not be deleted';
        return Redirect::back()->with($status, $message);
    }

    public function activate(Template $template)
    {
        $template = $this->templateService->activate($template);
        $status = $template ? Constants::SUCCESS : Constants::ERROR;
        $message = $template ? 'Template Activated Successfully' : 'Template Could Not Be Activated';
        return Redirect::route('templates.index')->with($status, $message);
    }

    public function preview(string $slug)
    {
        $folder = ucfirst($slug);
        $pagePath = resource_path("js/Pages/Templates/{$folder}/Index.vue");

        // return 404 if the template folder doesn't exist
        if (!file_exists($pagePath)) {
            abort(404);
        }

        $aboutMe     = $this->userService->first();
        $skills      = $this->skillService->all('id', 'asc');
        $educations  = $this->educationService->all('serial_no', 'asc');
        $projects    = $this->projectService->getAllProjects();
        $experiences = $this->experienceService->all();
        $cv          = $this->cvService->getActiveCv();
        $blogs       = $this->blogService->getFeaturedBlogs();

        return Inertia::render("Templates/{$folder}/Index", [
            'aboutMe'     => $aboutMe,
            'skills'      => $skills,
            'educations'  => $educations,
            'projects'    => $projects,
            'experiences' => $experiences,
            'cv'          => $cv,
            'blogs'       => $blogs,
            'mediumUrl'   => 'https://medium.com/@rejwancse10',
        ]);
    }
}
