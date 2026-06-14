<?php 

namespace App\Services;

use App\Models\JobApplication;
use App\Services\Core\BaseModelService;

class JobApplicationService extends BaseModelService
{
    public function model(): string 
    {
        return JobApplication::class;
    }

    public function getAllJobApplications()
    {
        return $this->model()::with('phases')->orderBy('id', 'DESC')->get();
    }
}