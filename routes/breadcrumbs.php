<?php

    use App\Models\Category;
    use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*
|--------------------------------------------------------------------------
| Projects
|--------------------------------------------------------------------------
*/
// Dashboard > Projects
Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->push('Projecten', route('projects'));
});

// Dashboard > Projects > New Project
Breadcrumbs::for('project.new', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push('Nieuw Project', route('project.new'));
});


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/
// Dashboard > Categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->push('Categorieën', route('categories'));
});

// Dashboard > Categories > New Category
Breadcrumbs::for('category.new', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Nieuwe Categorie', route('category.new'));
});
