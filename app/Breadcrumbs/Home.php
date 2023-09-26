<?php

namespace App\Breadcrumbs;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;
use Diglactic\Breadcrumbs\Trail;

// Головна сторінка
Breadcrumbs::for('home', function (Generator $trail) {
    $trail->push('Головна', route('home'));
});

// Категорії
Breadcrumbs::for('category', function (Generator $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('category', $category));
});

// Товари
Breadcrumbs::for('product', function (Generator $trail, $product) {
    $trail->parent('category', $product->category);
    $trail->push($product->name, route('product', $product));
});
