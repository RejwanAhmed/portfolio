<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CvService;
use App\Services\EducationService;
use App\Services\ExperienceService;
use App\Services\Project\ProjectService;
use App\Services\SkillService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected SkillService $skillService;
    protected EducationService $educationService;
    protected ProjectService $projectService;
    protected ExperienceService $experienceService;
    protected CvService $cvService;
    
    public function __construct(SkillService $skillService, EducationService $educationService, ProjectService $projectService, ExperienceService $experienceService, CvService $cvService)
    {
        $this->skillService = $skillService;
        $this->educationService = $educationService;
        $this->projectService = $projectService;
        $this->experienceService = $experienceService;
        $this->cvService = $cvService;
    }

    public function index()
    {
        $aboutMe = User::first();
        $skills = $this->skillService->all('id', 'asc');
        $educations = $this->educationService->all('serial_no', 'asc');
        $projects = $this->projectService->getAllProjects();
        $experiences = $this->experienceService->all();
        $cv = $this->cvService->getActiveCv();
        $responseData = [
            'aboutMe' => $aboutMe,
            'skills' => $skills,
            'educations' => $educations,
            'projects' => $projects,
            'experiences' => $experiences,
            'cv' => $cv,
        ];

        return Inertia::render('Welcome', $responseData);
    }
}
