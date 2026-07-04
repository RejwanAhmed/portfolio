<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\BlogService;
use App\Services\CvService;
use App\Services\EducationService;
use App\Services\ExperienceService;
use App\Services\Project\ProjectService;
use App\Services\SkillService;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected SkillService $skillService;
    protected EducationService $educationService;
    protected ProjectService $projectService;
    protected ExperienceService $experienceService;
    protected CvService $cvService;
    protected BlogService $blogService;
    
    public function __construct(SkillService $skillService, EducationService $educationService, ProjectService $projectService, ExperienceService $experienceService, CvService $cvService, BlogService $blogService)
    {
        $this->skillService = $skillService;
        $this->educationService = $educationService;
        $this->projectService = $projectService;
        $this->experienceService = $experienceService;
        $this->cvService = $cvService;
        $this->blogService = $blogService;
    }

    public function index()
    {
        $aboutMe = User::first();
        $skills = $this->skillService->all('id', 'asc');
        $educations = $this->educationService->all('serial_no', 'asc');
        $projects = $this->projectService->getAllProjects();
        $experiences = $this->experienceService->all();
        $cv = $this->cvService->getActiveCv();
        $blogs = $this->blogService->getFeaturedBlogs();
        $responseData = [
            'aboutMe' => $aboutMe,
            'skills' => $skills,
            'educations' => $educations,
            'projects' => $projects,
            'experiences' => $experiences,
            'cv' => $cv,
            'blogs' => $blogs,
            'mediumUrl' => 'https://medium.com/@rejwancse10',
        ];

        return Inertia::render('Welcome', $responseData);
    }
}
