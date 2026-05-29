<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VendorProfileController extends Controller
{
    private const API_BASE = 'https://biya.micromlm.in/api';

    public function show(string $username)
    {
        try {
            $response = Http::timeout(8)->get(self::API_BASE . '/u/' . $username);

            if ($response->status() === 404) {
                abort(404);
            }

            if (! $response->successful()) {
                abort(503);
            }

            $profile = $response->json('profile');

            if (! $profile || ! isset($profile['vendor'])) {
                abort(404);
            }

            return view('vendor-profile', compact('profile'));
        } catch (\Throwable $e) {
            Log::warning("Vendor profile API failed [{$username}]: " . $e->getMessage());
            abort(503);
        }
    }
}
