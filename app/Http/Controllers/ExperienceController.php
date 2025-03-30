<?php

namespace App\Http\Controllers;

use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Experience;
use Inertia\Inertia;
use App\Constants\Constants;
use Illuminate\Http\Request;
use App\Services\ExperienceService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Experience\CreateExperienceRequest;

class ExperienceController extends Controller
{
    protected ExperienceService $experienceService;

    public function __construct(ExperienceService $experienceService)
    {
        $this->experienceService = $experienceService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('experiences');
        $experiences = $this->experienceService->all();
        $responseData = [
            'experiences' => $experiences,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Experience List'
        ];

        return Inertia::render('Experience/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addExperience');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Add Experience',
        ];

        return Inertia::render('Experience/Create', $responseData);
    }

    public function store(CreateExperienceRequest $request)
    {
        $validatedData = $request->validated();
        $experience = $this->experienceService->create($validatedData);
        $status = $experience ? Constants::SUCCESS : Constants::ERROR;
        $message = $experience ? 'Experience created successfully' : 'Experience could not be created';
        return Redirect::route('experiences.index')->with($status, $message);
    }

    public function edit(Experience $experience)
    {
        $breadcrumbs = Breadcrumbs::generate('editExperience', $experience);
        $responseData = [
            'experience' => $experience,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Experience'
        ];
        
        return Inertia::render('Experience/Create', $responseData);
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $validatedData = $request->validated();
        $isUpdated = $this->experienceService->update($experience, $validatedData);
        $status = $isUpdated ? Constants::SUCCESS : Constants::ERROR;
        $message = $isUpdated ? 'Experience updated successfully' : 'Experience could not be updated';
        return Redirect::route('experiences.index')->with($status, $message);
    }

    public function destroy(Experience $experience)
    {
        $isDeleted = $this->experienceService->delete($experience->id);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Experience deleted successfully' : 'Experience could not be deleted';
        return Redirect::back()->with($status, $message);
    }
}
