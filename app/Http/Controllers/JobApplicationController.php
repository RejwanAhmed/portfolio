<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Http\Requests\JobApplication\CreateJobApplicationRequest;
use App\Http\Requests\JobApplication\UpdateJobApplicationRequest;
use App\Models\JobApplication;
use App\Services\JobApplicationService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JobApplicationController extends Controller
{
    protected JobApplicationService $jobApplicationService;
    
    public function __construct(JobApplicationService $jobApplicationService)
    {
        $this->jobApplicationService = $jobApplicationService;
    }

    public function index()
    {
        $jobApplications = $this->jobApplicationService->all();
        $breadcrumbs = Breadcrumbs::generate('job-applications');
        $responseData = [
            'jobApplications' => $jobApplications,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Job Application List'
        ];

        return Inertia::render('JobApplication/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addJobApplication');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Add Job Application',
        ];

        return Inertia::render('JobApplication/Create', $responseData);
    }

    public function store(CreateJobApplicationRequest $request)
    {
        $validatedData = $request->validated();
        $jobApplication = $this->jobApplicationService->create($validatedData);
        $status = $jobApplication ? Constants::SUCCESS : Constants::ERROR;
        $message = $jobApplication ? 'Job Application created successfully' : 'Job Application could not be created';
        return Redirect::route('job-applications.index')->with($status, $message);
    }

    public function edit(JobApplication $jobApplication)
    {
        $breadcrumbs = Breadcrumbs::generate('editJobApplication', $jobApplication);
        $responseData = [
            'jobApplication' => $jobApplication,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Job Application'
        ];
        
        return Inertia::render('JobApplication/Create', $responseData);
    }

    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        $validatedData = $request->validated();
        $isUpdated = $this->jobApplicationService->update($jobApplication, $validatedData);
        $status = $isUpdated ? Constants::SUCCESS : Constants::ERROR;
        $message = $isUpdated ? 'Job Application updated successfully' : 'Job Application could not be updated';
        return Redirect::route('job-applications.index')->with($status, $message);
    }

    public function show(JobApplication $jobApplication)
    {
        $breadcrumbs = Breadcrumbs::generate('viewJobApplication', $jobApplication);
        $responseData = [
            'jobApplication' => $jobApplication,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Job Application Details'
        ];
        
        return Inertia::render('JobApplication/Show', $responseData);
    }

    public function destroy(JobApplication $jobApplication)
    {
        $isDeleted = $this->jobApplicationService->delete($jobApplication->id);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Job Application deleted successfully' : 'Job Application could not be deleted';
        return Redirect::back()->with($status, $message);
    }
}
