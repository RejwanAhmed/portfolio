<?php 

namespace App\Services;

use App\Models\Skill;
use App\Services\Core\BaseModelService;

class SkillService extends BaseModelService
{
    public function model(): string 
    {
        return Skill::class;
    }
}