<?php 

namespace App\Services;

use App\Models\Skill;
use App\Services\Core\BaseModelService;
use App\Services\Core\HelperService;

class SkillService extends BaseModelService
{
    public function model(): string 
    {
        return Skill::class;
    }

    public function createSkill($validatedData)
    {
        $imagePath = HelperService::uploadImage($validatedData['image_url'], null, 'uploads/skills');
        $validatedData['image_url'] = $imagePath;
        return $this->create($validatedData);
    }

    public function updateSkill(Skill $skill, $validatedData)
    {
        $imagePath = HelperService::uploadImage($validatedData['image_url'], $skill->image_url, 'uploads/skills');
        $validatedData['image_url'] = $imagePath;
        return $this->update($skill, $validatedData);
    }

    public function deleteSkill(Skill $skill)
    {
        if ($this->hasReferences($skill)) {
            return false; 
        }
        HelperService::deleteImage($skill->image_url);
        return $this->delete($skill->id);  
    }

    public function hasReferences(Skill $skill)
    {
        if ($skill->projects()->exists()) {
            return true;
        }
    }
}