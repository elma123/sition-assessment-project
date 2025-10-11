<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Support\ProductService;

// Route to plp
Route::get('/', function () {
    return Inertia::render('Plp');
})->name('plp');

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
