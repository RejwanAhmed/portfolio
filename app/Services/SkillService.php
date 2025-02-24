<?php 

namespace App\Services;

use App\Models\Skill;
use App\Services\Core\BaseModelService;
use Illuminate\Support\Facades\File;

class SkillService extends BaseModelService
{
    public function model(): string 
    {
        return Skill::class;
    }

    public function createSkill($validatedData)
    {
        $imagePath = $this->handleImageUpload($validatedData['image_url']);
        $validatedData['image_url'] = $imagePath;
        return $this->create($validatedData);
    }

    public function updateSkill(Skill $skill, $validatedData)
    {
        $imagePath = $this->handleImageUpload($validatedData['image_url'], $skill->image_url);
        $validatedData['image_url'] = $imagePath;
        return $this->update($skill, $validatedData);
    }

    public function deleteSkill(Skill $skill)
    {
        if($skill->image_url && File::exists(public_path($skill->image_url))) {
            File::delete(public_path($skill->image_url));
        }

        return $this->delete($skill->id);
    }

    public function handleImageUpload($image = null, $oldImagePath = null)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            if($oldImagePath && File::exists(public_path($oldImagePath))) {
                File::delete(public_path($oldImagePath));
            }

            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/skills'), $imageName);
            $imagePath = 'uploads/skills/'.$imageName;
            return $imagePath;
        }

        return $oldImagePath;
    }
}