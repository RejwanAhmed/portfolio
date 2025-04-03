<?php 

namespace App\Services;

use App\Models\Education;
use App\Services\Core\HelperService;
use App\Services\Core\BaseModelService;

class EducationService extends BaseModelService
{
    public function model(): string 
    {
        return Education::class;
    }

    public function createEducation($validatedData)
    {
        $logoPath = HelperService::uploadImage($validatedData['logo'], null, 'uploads/educations');
        $validatedData['logo'] = $logoPath;
        return $this->create($validatedData);
    }

    public function updateEducation(Education $education, $validatedData)
    {
        $logoPath = HelperService::uploadImage($validatedData['logo'], $education->logo, 'uploads/educations');
        $validatedData['logo'] = $logoPath;
        return $this->update($education, $validatedData);
    }

    public function deleteEducation(Education $education)
    {
        if($education->logo) {
            HelperService::deleteImage($education->logo);
        }
        return $this->delete($education->id);  
    }
}