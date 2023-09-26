<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Головна', route('home'));
});

// Home > Blog
Breadcrumbs::for('news.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новини', route('news.index'));
});

Breadcrumbs::for('news.show', function (BreadcrumbTrail $trail, $news) {
    $trail->parent('news.index');
    $trail->push($news->name, route('news.show', $news));
});

// Home > Catalog
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

// Home > Catalog > Category
Breadcrumbs::for('category.products', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog');
    $trail->push($category->name, route('category.products', $category->slug));
});

// Home > Catalog > Category > Product
Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $currentProduct) {
    $trail->parent('category.products', $currentProduct->categories);
    $trail->push($currentProduct->name, route('products.show', [
        'categorySlug' => $currentProduct->categories->slug,
        'productSlug' => $currentProduct->slug,
    ]));
});
