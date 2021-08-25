<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Tags -> Home
Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->push('Tags', route('tags.index'));
});
// Tags -> Add
Breadcrumbs::for('tags_add', function (BreadcrumbTrail $trail) {
    $trail->parent('tags');
    $trail->push('Add', route('tags.create'));
});
// Tags -> Edit
Breadcrumbs::for('tags_edit', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags');
    $trail->push('Edit', route('tags.edit', $tag));
    $trail->push($tag->title, route('tags.edit', $tag));
});

// Posts -> Home
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->push('Posts', route('posts.index'));
});

// Posts -> Add
Breadcrumbs::for('posts_add', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('Add', route('posts.create'));
});


