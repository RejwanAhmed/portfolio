<?php

namespace App\Services\Project;

use App\Models\Project\Project;
use App\Models\Project\ProjectImage;
use App\Services\Core\BaseModelService;
use Illuminate\Support\Facades\File;
use App\Services\Core\HelperService;

class ProjectImageService extends BaseModelService
{
    public function model(): string 
    {
        return ProjectImage::class;
    }
    
    public function storeImage(Project $project, $validatedData)
    {
        $validatedData['project_id'] = $project->id;
        $image = $validatedData['image_url'];
        $imagePath = HelperService::uploadImage($image, null, 'uploads/projects');
        $validatedData['image_url'] = $imagePath;
        return $this->create($validatedData);
    }

    public function deleteImage(ProjectImage $projectImage)
    {
        HelperService::deleteImage($projectImage->image_url);
        return $this->delete($projectImage->id);
    }

}