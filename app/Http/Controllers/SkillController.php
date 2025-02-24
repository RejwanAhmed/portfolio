<?php

namespace App\Http\Controllers;

use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Models\Skill;
use Inertia\Inertia;
use App\Constants\Constants;
use Illuminate\Http\Request;
use App\Services\SkillService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Skill\CreateSkillRequest;

class SkillController extends Controller
{
    protected SkillService $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function index()
    {
        $breadcrumbs = Breadcrumbs::generate('skills');
        $skills = $this->skillService->all();
        $responseData = [
            'skills' => $skills,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Skill List'
        ];
        return Inertia::render('Skill/Index', $responseData);
    }

    public function create()
    {
        $breadcrumbs = Breadcrumbs::generate('addSkill');
        $responseData = [
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Add Skill'
        ];
        return Inertia::render('Skill/Create', $responseData);
    }

    public function store(CreateSkillRequest $request)
    {
        $validatedData = $request->validated();
        $skill = $this->skillService->createSkill($validatedData);
        $status = $skill ? Constants::SUCCESS : Constants::ERROR;
        $message = $skill ? 'New Skill Created Successfully' : 'New Skill Could Not Be Created';
        return Redirect::route('skills.index')->with($status, $message);
    }

    public function edit(Skill $skill)
    {
        $breadcrumbs = Breadcrumbs::generate('editSkill', $skill);
        $responseData = [
            'skill' => $skill,
            'breadcrumbs' => $breadcrumbs,
            'pageTitle' => 'Edit Skill'
        ];
        return Inertia::render('Skill/Create', $responseData);
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validatedData = $request->validated();
        $skill = $this->skillService->updateSkill($skill, $validatedData);
        $status = $skill ? Constants::SUCCESS : Constants::ERROR;
        $message = $skill ? 'Skill Updated Successfully' : 'Skill Could Not Be Updated';
        return Redirect::route('skills.index')->with($status, $message);
    }

    public function destroy(Skill $skill)
    {
        $isDeleted = $this->skillService->deleteSkill($skill);
        $status = $isDeleted ? Constants::SUCCESS : Constants::ERROR;
        $message = $isDeleted ? 'Skill Deleted Successfully' : 'Skill Could Not Be Deleted';
        return Redirect::route('skills.index')->with($status, $message);
    }
}
