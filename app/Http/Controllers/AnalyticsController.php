<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function trackClick(Request $request)
    {
        try {
            AnalyticsEvent::create([
                'event_type' => 'download_click',
                'platform'   => $request->input('platform', 'android'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer'   => $request->headers->get('referer'),
            ]);
        } catch (\Exception) {
            // Silent fail
        }

        return response()->json(['success' => true]);
    }
}
