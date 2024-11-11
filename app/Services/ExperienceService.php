<?php 

namespace App\Services;

use App\Models\Experience;
use App\Services\Core\BaseModelService;

class ExperienceService extends BaseModelService
{
    public function model(): string 
    {
        return Experience::class;
    }
}