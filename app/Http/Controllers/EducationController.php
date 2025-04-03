<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Education;
use App\Constants\Constants;
use Illuminate\Http\Request;
use App\Services\EducationService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Education\CreateEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;

class EducationController extends Controller
{
    protected EducationService $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('educations');
        $educations = $this->educationService->all('serial_no', 'desc');
        $responseData = [
            'educations' => $educations,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Education List'
        ];
        return Inertia::render('Education/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addEducation');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Add Education',
        ];

        return Inertia::render('Education/Create', $responseData);
    }

    public function store(CreateEducationRequest $request)
    {
        $validatedData = $request->validated();
        $education = $this->educationService->createEducation($validatedData);
        $status = $education ? Constants::SUCCESS : Constants::ERROR;
        $message = $education ? 'New Education Created Successfully' : 'New Education Could Not Be Created';
        return Redirect::route('educations.index')->with($status, $message);
    }

    public function edit(Education $education)
    {
        $breadcrumbs = Breadcrumbs::generate('editEducation', $education);
        $responseData = [
            'education' => $education,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Education',
        ];
        
        return Inertia::render('Education/Create', $responseData);
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $validatedData = $request->validated();
        $education = $this->educationService->updateEducation($education, $validatedData);
        $status = $education ? Constants::SUCCESS : Constants::ERROR;
        $message = $education ? 'Education Updated Successfully' : 'Education Could Not Be Updated';
        return Redirect::route('educations.index')->with($status, $message);
    }

    public function destroy(Education $education)
    {
        $isDeleted = $this->educationService->deleteEducation($education);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Education Deleted Successfully' : 'Education Could Not Be Deleted';
        return Redirect::route('educations.index')->with($status, $message);
    }
}
