<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Support\ProductService;

/**
 * Create Routes
 */

// Standard
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/blog', function () {
    return Inertia::render('Standard', [
        'title' => 'Blog',
    ]);
})->name('blog');

Route::get('/brands', function () {
    return Inertia::render('Standard', [
        'title' => 'Brands',
    ]);
})->name('brands');

Route::get('/account', function () {
    return Inertia::render('Standard', [
        'title' => 'Account',
    ]);
})->name('account');

// PLP
Route::inertia('/sale', 'Plp');

Route::get('/{category}', function ($category) {
    $categories = ProductService::categories(); // Collection

    if (!$categories->contains($category)) {
        abort(404, 'Category not found');
    }

    return Inertia::render('Plp', [
        'category' => $category,
    ]);
})->name('category');

// Get all product data
Route::get('/proxy/products', function () {
    return response()->json([
        'products' => ProductService::all(),
    ]);
});

// Get all product categories
Route::get('/proxy/product/categories', function () {
    return response()->json([
        'categories' => ProductService::categories(),
    ]);
});

// Route to pdp
Route::get('/products/{id}', function ($id) {
    $product = ProductService::find($id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    return Inertia::render('Pdp', [
        'product' => $product,
    ]);
});

Route::get('/proxy/products/{category}', function ($category) {
    $categories = ProductService::categories(); // Collection

    if (!$categories->contains($category)) {
        abort(404, 'Category not found');
    }

    return response()->json([
        'products' => ProductService::findByCategory($category),
    ]);
});
