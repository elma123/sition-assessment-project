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
