<?php 

namespace App\Services;

use App\Models\Education;
use App\Services\Core\BaseModelService;

class EducationService extends BaseModelService
{
    public function model(): string 
    {
        return Education::class;
    }
}