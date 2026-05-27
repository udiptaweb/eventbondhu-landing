<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    private const CATEGORIES_URL = 'https://biya.micromlm.in/api/vendors/categories';

    public function index(Request $request)
    {
        // Track page view silently
        try {
            AnalyticsEvent::create([
                'event_type' => 'page_view',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer'   => $request->headers->get('referer'),
            ]);
        } catch (\Exception) {}
        // Fetch vendor categories — cached 6 hours (stored as plain array to avoid Collection unserialize issues)
        $categoriesArray = Cache::remember('services', now()->addHours(6), function () {
            try {
                $response = Http::timeout(8)->get(self::CATEGORIES_URL);

                if (! $response->successful()) {
                    return [];
                }

                $items = $response->json('categories') ?? [];

                return is_array($items) ? array_values($items) : [];
            } catch (\Throwable $e) {

                Log::warning('Vendor categories API failed: ' . $e->getMessage());

                return [];
            }
        });

        $categories = $categoriesArray;
        return view('welcome', compact('categories'));
    }
}
