<?php 

namespace App\Services;

use App\Models\JobApplication;
use App\Models\JobApplicationPhase;
use App\Services\Core\BaseModelService;

class JobApplicationPhaseService extends BaseModelService
{
    public function model(): string 
    {
        return JobApplicationPhase::class;
    }

    public function getJobApplicationPhases(JobApplication $jobApplication)
    {
        return $jobApplication->phases()->orderBy('scheduled_at')->get();
    }

    public function createPhase(JobApplication $jobApplication, array $data): JobApplicationPhase
    {
        return $jobApplication->phases()->create($data);
    }

    public function updatePhase(JobApplicationPhase $phase, array $data): JobApplicationPhase
    {
        $phase->update($data);
        return $phase;
    }

    public function deletePhase(JobApplicationPhase $phase): void
    {
        $phase->delete();
    }
}