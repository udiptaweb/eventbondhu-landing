<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        try {
            AnalyticsEvent::create([
                'event_type' => 'page_view',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer'   => $request->headers->get('referer'),
            ]);
        } catch (\Exception) {
            // Silent fail — don't break the page if DB is unavailable
        }

        return view('welcome');
    }
}
