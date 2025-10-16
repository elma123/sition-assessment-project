<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ProductService
{
    /**
     * Get all products from the extern JSON url
     * and expanding the data by adding per product an unique id
     *
     * @return array
     */
    public static function all(): array
    {
        return cache()->remember('products', 60, function () {
            $response = Http::get('https://assessement.sition.cloud/products.json');
            $data = $response->json();

            $products = $data['products'] ?? [];
            $productsWithSlug = [];

            foreach ($products as $index => $product) {
                if (is_array($product)) {
                    $product['id'] = Str::slug($product['title']) . '-' . $index;
                }
                $productsWithSlug[$index] = $product;
            }

            return $productsWithSlug;
        });
    }

    /**
     * Get product data of 1 product matching the id
     *
     * @param string $id
     * @return array|null
     */
    public static function find(string $id): ?array
    {
        $products = self::all();

        foreach ($products as $product) {
            if (($product['id'] ?? null) === $id) {
                return $product;
            }
        }

        return null;
    }

    /**
     * Get all unique categories from the product data
     *
     * @return \Illuminate\Support\Collection
     */
    public static function categories(): Collection
    {
        return cache()->remember('product_categories', 60, function () {
            $products = self::all();

            return collect($products)   // convert to Laravel Collection
                ->pluck('categories')   // Get only the 'categories' form each product
                ->flatten()             // Flatten nested arrays into single array
                ->filter()              // Remove empty or null values
                ->unique()              // Remove duplicate categories
                ->values();             // Reset the keys of the collection
        });
    }

    /**
     * Get all products per category
     *
     * @return array
     */
    public static function findByCategory(string $category): array
    {
        $products = self::all();
        $matchedProducts = [];

        foreach ($products as $product) {
            if (!empty($product['categories']) && in_array($category, $product['categories'])) {
                $matchedProducts[] = $product;
            }
        }

        return $matchedProducts;
    }
}
