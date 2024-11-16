<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Project\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
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

