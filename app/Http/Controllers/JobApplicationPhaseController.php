<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationPhase\CreateJobApplicationPhaseRequest;
use App\Http\Requests\JobApplicationPhase\UpdateJobApplicationPhaseRequest;
use App\Models\JobApplication;
use App\Models\JobApplicationPhase;
use App\Services\JobApplicationPhaseService;
use Illuminate\Http\JsonResponse;

class JobApplicationPhaseController extends Controller
{
    protected $jobApplicationPhaseService;
    
    public function __construct(JobApplicationPhaseService $jobApplicationPhaseService)
    {
        $this->jobApplicationPhaseService = $jobApplicationPhaseService;
    }
    
    public function index(JobApplication $jobApplication): JsonResponse
    {
        $phases = $this->jobApplicationPhaseService->getJobApplicationPhases($jobApplication);
        return response()->json($phases);
    }

    public function store(CreateJobApplicationPhaseRequest $request, JobApplication $jobApplication): JsonResponse
    {
        $validatedData = $request->validated();
        $phase = $this->jobApplicationPhaseService->createPhase($jobApplication, $validatedData);
        return response()->json($phase, 201);
    }

    public function update(UpdateJobApplicationPhaseRequest $request, JobApplication $jobApplication, JobApplicationPhase $phase): JsonResponse
    {
        $validatedData = $request->validated();
        $phase = $this->jobApplicationPhaseService->update($phase, $validatedData);
        return response()->json($phase);
    }

    public function destroy(JobApplication $jobApplication, JobApplicationPhase $phase): JsonResponse
    {
        $this->jobApplicationPhaseService->delete($phase->id);
        return response()->json(null, 204);
    }
}
