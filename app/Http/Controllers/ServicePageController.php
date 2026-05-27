<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ServicePageController extends Controller
{
    private const CATEGORIES_URL = 'https://biya.micromlm.in/api/vendors/categories';

    public function show(string $key)
    {
        $categories = Cache::remember('services', now()->addHours(6), function () {
            try {
                $response = Http::timeout(8)->get(self::CATEGORIES_URL);
                $items = $response->successful() ? ($response->json('categories') ?? []) : [];
                return is_array($items) ? array_values($items) : [];
            } catch (\Throwable $e) {
                Log::warning('Vendor categories API failed: ' . $e->getMessage());
                return [];
            }
        });

        $category = collect($categories)->firstWhere('key', $key);

        if (! $category) {
            abort(404);
        }

        return view('service-page', compact('category', 'categories'));
    }
}
