<?php

namespace App\Http\Controllers\Project;

use App\Constants\Constants;
use App\Models\Project\ProjectImage;
use Illuminate\Http\Request;
use App\Models\Project\Project;
use App\Http\Controllers\Controller;
use App\Services\Project\ProjectImageService;
use App\Http\Requests\Project\CreateProjectImageRequest;

class ProjectImageController extends Controller
{
    protected ProjectImageService $projectImageService;

    public function __construct(ProjectImageService $projectImageService)
    {
        $this->projectImageService = $projectImageService;
    }

    public function index(Project $project)
    {
        $images =  $project->projectImages->map(function ($image) {
            $image->image_url = asset($image->image_url);
            return $image;
        });
        return response()->json(['images' => $images]);
    }

    public function store(CreateProjectImageRequest $request, Project $project)
    {
        $validatedData = $request->validated();
        $projectImage = $this->projectImageService->storeImage($project, $validatedData);
        $status = $projectImage ? Constants::SUCCESS : Constants::ERROR;
        return response()->json(['status' => $status]);
    }

    public function destroy(ProjectImage $projectImage)
    {
        $isDeleted = $this->projectImageService->deleteImage($projectImage);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        return response()->json(['status' => $status]);
    }
}
