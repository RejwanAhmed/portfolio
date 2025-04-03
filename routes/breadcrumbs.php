<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project\Project;
use App\Models\Skill;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile.edit'));
});

// Home > Project
Breadcrumbs::for('project', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project', route('projects.index'));
});

// Home > Project > Projects
Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('project');
    $trail->push('List', route('projects.index'));
});

// Home > Project > Add
Breadcrumbs::for('addProject', function (BreadcrumbTrail $trail) {
    $trail->parent('project');
    $trail->push('Add', route('projects.create'));
});

// Home > Project > Edit
Breadcrumbs::for('editProject', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project');
    $trail->push('Edit', route('projects.edit', $project));
});

// Home > Skill
Breadcrumbs::for('skill', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Skill', route('skills.index'));
});

// Home > Skill > Skills
Breadcrumbs::for('skills', function (BreadcrumbTrail $trail) {
    $trail->parent('skill');
    $trail->push('List', route('skills.index'));
});

// Home > Skill > Add
Breadcrumbs::for('addSkill', function (BreadcrumbTrail $trail) {
    $trail->parent('skill');
    $trail->push('Add', route('skills.create'));
});

// Home > Skill > Edit
Breadcrumbs::for('editSkill', function (BreadcrumbTrail $trail, Skill $skill) {
    $trail->parent('skill');
    $trail->push('Edit', route('skills.edit', $skill));
});

// Home > Experince
Breadcrumbs::for('experience', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Experience', route('experiences.index'));
});

// Home > Experince > Experinces
Breadcrumbs::for('experiences', function (BreadcrumbTrail $trail) {
    $trail->parent('experience');
    $trail->push('List', route('experiences.index'));
});

// Home > Experince > Add
Breadcrumbs::for('addExperience', function (BreadcrumbTrail $trail) {
    $trail->parent('experience');
    $trail->push('Add', route('experiences.create'));
});

// Home > Experince > Edit
Breadcrumbs::for('editExperience', function (BreadcrumbTrail $trail, Experience $experience) {
    $trail->parent('experience');
    $trail->push('Edit', route('experiences.edit', $experience));
});

// Home > Education
Breadcrumbs::for('education', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Education', route('educations.index'));
});

// Home > Education > Educations
Breadcrumbs::for('educations', function (BreadcrumbTrail $trail) {
    $trail->parent('education');
    $trail->push('List', route('educations.index'));
});

// Home > Experince > Add
Breadcrumbs::for('addEducation', function (BreadcrumbTrail $trail) {
    $trail->parent('education');
    $trail->push('Add', route('educations.create'));
});

// Home > Experince > Edit
Breadcrumbs::for('editEducation', function (BreadcrumbTrail $trail, Education $education) {
    $trail->parent('education');
    $trail->push('Edit', route('educations.edit', $education));
});
