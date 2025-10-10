<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Plp');
})->name('plp');

/* Get all product data */
Route::get('/proxy/products', function () {
    $response = Http::get('https://assessement.sition.cloud/products.json');
    return $response->json();
});

/* Get all product categories */
Route::get('/proxy/product/categories', function () {
    $response = Http::get('https://assessement.sition.cloud/products.json');
    $data = $response->json();

    $categories = collect($data['products'] ?? [])
        ->pluck('categories')             // pick only the 'category' field
        ->flatten()                       // merge all arrays into one flat array
        ->filter()                        // remove null/empty values
        ->unique()                        // remove duplicates
        ->values();                       // reindex the collection

    return response()->json([
        'categories' => $categories,
    ]);
});
