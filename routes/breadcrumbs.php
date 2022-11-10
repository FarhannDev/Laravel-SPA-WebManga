<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('manageDashboard'));
});

Breadcrumbs::for('data-komik', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Data Komik', route('manageKomik'));
});

Breadcrumbs::for('komik-add', function (BreadcrumbTrail $trail) {
    $trail->parent('data-komik');
    $trail->push('Add New Komik', route('manageKomikCreate'));
});

Breadcrumbs::for('komik-edit', function (BreadcrumbTrail $trail, $comic) {
    $trail->parent('data-komik');
    $trail->push('Edit / ' . \Illuminate\Support\Str::limit($comic->comic_title ?? '', 20, ' ...'), route('manageKomikEdit', $comic));
});


Breadcrumbs::for('komik-detail', function (BreadcrumbTrail $trail, $comic) {
    $trail->parent('data-komik');
    $trail->push(\Illuminate\Support\Str::limit($comic->comic_title ?? '', 20, ' ...'), route('manageKomikShow', $comic));
});


Breadcrumbs::for('data-blog', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Data Blog', route('manageBlogIndex'));
});

Breadcrumbs::for('blog-add', function (BreadcrumbTrail $trail) {
    $trail->parent('data-blog');
    $trail->push('Add New Blog', route('manageBlogCreate'));
});

Breadcrumbs::for('blog-edit', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('data-blog');
    $trail->push('Edit / ' . \Illuminate\Support\Str::limit($blog->blog_name ?? '', 20, ' ...'), route('manageBlogEdit', $blog));
});
