<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticsEvent;

class DashboardController extends Controller
{
    public function index()
    {
        $views  = fn() => AnalyticsEvent::where('event_type', 'page_view');
        $clicks = fn() => AnalyticsEvent::where('event_type', 'download_click');

        $stats = [
            'views' => [
                'total' => $views()->count(),
                'today' => $views()->whereDate('created_at', today())->count(),
                'week'  => $views()->whereBetween('created_at', [
                    today()->startOfWeek(),
                    today()->endOfWeek(),
                ])->count(),
                'month' => $views()->whereMonth('created_at', now()->month)
                                   ->whereYear('created_at', now()->year)->count(),
            ],
            'clicks' => [
                'total'   => $clicks()->count(),
                'today'   => $clicks()->whereDate('created_at', today())->count(),
                'week'    => $clicks()->whereBetween('created_at', [
                    today()->startOfWeek(),
                    today()->endOfWeek(),
                ])->count(),
                'month'   => $clicks()->whereMonth('created_at', now()->month)
                                      ->whereYear('created_at', now()->year)->count(),
                'android' => $clicks()->where('platform', 'android')->count(),
                'ios'     => $clicks()->where('platform', 'ios')->count(),
            ],
        ];

        $totalViews = $stats['views']['total'];
        $stats['ctr'] = $totalViews > 0
            ? round(($stats['clicks']['total'] / $totalViews) * 100, 1)
            : 0;

        // Last 30 days chart data
        $period = collect(range(29, 0))
            ->map(fn($i) => today()->subDays($i)->format('Y-m-d'));

        $rawData = AnalyticsEvent::selectRaw('DATE(created_at) as date, event_type, COUNT(*) as count')
            ->where('created_at', '>=', today()->subDays(29)->startOfDay())
            ->groupBy('date', 'event_type')
            ->get()
            ->groupBy('event_type');

        $viewsByDate  = $rawData->get('page_view',      collect())->pluck('count', 'date');
        $clicksByDate = $rawData->get('download_click', collect())->pluck('count', 'date');

        $chart = [
            'labels' => $period->map(fn($d) => date('d M', strtotime($d)))->values(),
            'views'  => $period->map(fn($d) => (int) ($viewsByDate[$d]  ?? 0))->values(),
            'clicks' => $period->map(fn($d) => (int) ($clicksByDate[$d] ?? 0))->values(),
        ];

        $recentEvents = AnalyticsEvent::latest()->take(100)->get();

        return view('admin.dashboard', compact('stats', 'chart', 'recentEvents'));
    }
}
