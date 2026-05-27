<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContentPageController extends Controller
{
    private const BASE_URL = 'https://biya.micromlm.in/api';

    private const PAGES = [
        'terms-conditions' => ['type' => 'terms_conditions', 'title' => 'Terms & Conditions'],
        'privacy-policy'   => ['type' => 'privacy_policy',   'title' => 'Privacy Policy'],
        'about'            => ['type' => 'about_app',         'title' => 'About the App'],
        'contact-support'  => ['type' => 'contact_support',  'title' => 'Contact & Support'],
    ];

    public function show(string $page)
    {
        if (! array_key_exists($page, self::PAGES)) {
            abort(404);
        }

        ['type' => $type, 'title' => $title] = self::PAGES[$page];

        $content = Cache::remember("app_content_{$type}", now()->addHour(), function () use ($type) {
            try {
                $response = Http::timeout(8)->get(self::BASE_URL . "/app/content/{$type}");

                return $response->successful() ? $response->json() : null;
            } catch (\Throwable $e) {
                Log::warning("Content API failed [{$type}]: {$e->getMessage()}");

                return null;
            }
        });

        return view('content-page', compact('page', 'title', 'content'));
    }
}
