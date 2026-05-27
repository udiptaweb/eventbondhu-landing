@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')

{{-- ── Page header ──────────────────────────────────────────── --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Analytics Dashboard</h1>
        <p class="text-gray-400 text-sm mt-0.5">
            Last updated {{ now()->format('d M Y, h:i A') }} IST
        </p>
    </div>
    <a href="{{ route('home') }}" target="_blank"
       class="inline-flex items-center gap-2 text-sm font-medium text-saffron-600 hover:text-saffron-700
              bg-saffron-50 hover:bg-saffron-100 border border-saffron-200 px-4 py-2 rounded-xl transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
        </svg>
        View Landing Page
    </a>
</div>

{{-- ── Primary stat cards ───────────────────────────────────── --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Total Page Views --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-start justify-between mb-4">
            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-blue-500 bg-blue-50 px-2.5 py-1 rounded-full">All Time</span>
        </div>
        <p class="text-3xl font-black text-gray-900">{{ number_format($stats['views']['total']) }}</p>
        <p class="text-gray-500 text-sm mt-1 font-medium">Total Page Views</p>
    </div>

    {{-- Views Today --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-start justify-between mb-4">
            <div class="w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-emerald-500 bg-emerald-50 px-2.5 py-1 rounded-full">Today</span>
        </div>
        <p class="text-3xl font-black text-gray-900">{{ number_format($stats['views']['today']) }}</p>
        <p class="text-gray-500 text-sm mt-1 font-medium">Visitors Today</p>
    </div>

    {{-- Total Download Clicks --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-start justify-between mb-4">
            <div class="w-11 h-11 rounded-xl bg-saffron-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-saffron-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-saffron-600 bg-saffron-50 px-2.5 py-1 rounded-full">All Time</span>
        </div>
        <p class="text-3xl font-black text-gray-900">{{ number_format($stats['clicks']['total']) }}</p>
        <p class="text-gray-500 text-sm mt-1 font-medium">Download Clicks</p>
    </div>

    {{-- Click-Through Rate --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <div class="flex items-start justify-between mb-4">
            <div class="w-11 h-11 rounded-xl bg-crimson-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-crimson-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-crimson-500 bg-crimson-50 px-2.5 py-1 rounded-full">CTR</span>
        </div>
        <p class="text-3xl font-black text-gray-900">{{ $stats['ctr'] }}<span class="text-xl text-gray-400">%</span></p>
        <p class="text-gray-500 text-sm mt-1 font-medium">Click-Through Rate</p>
    </div>

</div>

{{-- ── Chart + Platform breakdown ──────────────────────────── --}}
<div class="grid lg:grid-cols-3 gap-5 mb-6">

    {{-- Traffic line chart --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h2 class="font-semibold text-gray-900">Traffic Overview</h2>
                <p class="text-gray-400 text-xs mt-0.5">Last 30 days — page views vs download clicks</p>
            </div>
            <div class="flex items-center gap-4 text-xs text-gray-500">
                <span class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-full bg-blue-500 inline-block"></span>Views
                </span>
                <span class="flex items-center gap-1.5">
                    <span class="w-3 h-3 rounded-full bg-saffron-500 inline-block"></span>Clicks
                </span>
            </div>
        </div>
        <div class="relative" style="height:240px">
            <canvas id="trafficChart"></canvas>
        </div>
    </div>

    {{-- Platform + Period cards --}}
    <div class="flex flex-col gap-5">

        {{-- Platform breakdown --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex-1">
            <h2 class="font-semibold text-gray-900 mb-4">Download Platform</h2>

            @php
                $totalDl = $stats['clicks']['android'] + $stats['clicks']['ios'];
                $androidPct = $totalDl > 0 ? round($stats['clicks']['android'] / $totalDl * 100) : 0;
                $iosPct     = $totalDl > 0 ? round($stats['clicks']['ios']     / $totalDl * 100) : 0;
            @endphp

            @if($totalDl === 0)
            <p class="text-gray-400 text-sm text-center py-4">No download clicks yet</p>
            @else
            <div class="space-y-4">
                {{-- Android --}}
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="flex items-center gap-2 font-medium text-gray-700">
                            <svg class="w-4 h-4 text-green-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6 18c0 .55.45 1 1 1h1v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h2v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h1c.55 0 1-.45 1-1V8H6v10zM3.5 8C2.67 8 2 8.67 2 9.5v7c0 .83.67 1.5 1.5 1.5S5 17.33 5 16.5v-7C5 8.67 4.33 8 3.5 8zm17 0c-.83 0-1.5.67-1.5 1.5v7c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5v-7c0-.83-.67-1.5-1.5-1.5zm-4.97-5.84l1.3-1.3c.2-.2.2-.51 0-.71-.2-.2-.51-.2-.71 0l-1.48 1.48A5.84 5.84 0 0012 1c-.96 0-1.86.23-2.66.63L7.88.15c-.2-.2-.51-.2-.71 0-.2.2-.2.51 0 .71l1.31 1.31A5.983 5.983 0 006 7h12a5.983 5.983 0 00-2.47-4.84zM10 5H9V4h1v1zm5 0h-1V4h1v1z"/>
                            </svg>
                            Android
                        </span>
                        <span class="text-gray-500 font-medium">{{ number_format($stats['clicks']['android']) }} <span class="text-gray-400">({{ $androidPct }}%)</span></span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full transition-all duration-700"
                             style="width:{{ $androidPct }}%"></div>
                    </div>
                </div>
                {{-- iOS --}}
                <div>
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="flex items-center gap-2 font-medium text-gray-700">
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.37 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                            </svg>
                            iOS
                        </span>
                        <span class="text-gray-500 font-medium">{{ number_format($stats['clicks']['ios']) }} <span class="text-gray-400">({{ $iosPct }}%)</span></span>
                    </div>
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gray-500 rounded-full transition-all duration-700"
                             style="width:{{ $iosPct }}%"></div>
                    </div>
                </div>

                <p class="text-xs text-gray-400 text-center pt-1">{{ number_format($totalDl) }} total clicks</p>
            </div>
            @endif
        </div>

        {{-- Today's clicks --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h2 class="font-semibold text-gray-900 mb-3 text-sm">Today's Activity</h2>
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-blue-50 rounded-xl p-3 text-center">
                    <p class="text-2xl font-black text-blue-600">{{ number_format($stats['views']['today']) }}</p>
                    <p class="text-blue-500 text-xs font-medium mt-0.5">Views</p>
                </div>
                <div class="bg-saffron-50 rounded-xl p-3 text-center">
                    <p class="text-2xl font-black text-saffron-600">{{ number_format($stats['clicks']['today']) }}</p>
                    <p class="text-saffron-500 text-xs font-medium mt-0.5">Clicks</p>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ── Period breakdown ─────────────────────────────────────── --}}
<div class="grid sm:grid-cols-2 gap-5 mb-6">

    {{-- Page views breakdown --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-blue-500 inline-block"></span>
            Page Views by Period
        </h2>
        <div class="space-y-3">
            @foreach([
                ['Today',      $stats['views']['today'], $stats['views']['total']],
                ['This Week',  $stats['views']['week'],  $stats['views']['total']],
                ['This Month', $stats['views']['month'], $stats['views']['total']],
                ['All Time',   $stats['views']['total'], $stats['views']['total']],
            ] as [$label, $val, $max])
            @php $pct = $max > 0 ? min(100, round($val / $max * 100)) : 0; @endphp
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">{{ $label }}</span>
                    <span class="font-semibold text-gray-900">{{ number_format($val) }}</span>
                </div>
                <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-400 rounded-full" style="width:{{ $pct }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Download clicks breakdown --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-saffron-500 inline-block"></span>
            Download Clicks by Period
        </h2>
        <div class="space-y-3">
            @foreach([
                ['Today',      $stats['clicks']['today'], $stats['clicks']['total']],
                ['This Week',  $stats['clicks']['week'],  $stats['clicks']['total']],
                ['This Month', $stats['clicks']['month'], $stats['clicks']['total']],
                ['All Time',   $stats['clicks']['total'], $stats['clicks']['total']],
            ] as [$label, $val, $max])
            @php $pct = $max > 0 ? min(100, round($val / $max * 100)) : 0; @endphp
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">{{ $label }}</span>
                    <span class="font-semibold text-gray-900">{{ number_format($val) }}</span>
                </div>
                <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-saffron-400 rounded-full" style="width:{{ $pct }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

{{-- ── Recent events table ──────────────────────────────────── --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <div>
            <h2 class="font-semibold text-gray-900">Recent Events</h2>
            <p class="text-gray-400 text-xs mt-0.5">Last {{ $recentEvents->count() }} events</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>Page View
            </span>
            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-saffron-600 bg-saffron-50 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-saffron-500"></span>Download Click
            </span>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">#</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Event</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Platform</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">IP Address</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide hidden lg:table-cell">Referrer</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($recentEvents as $event)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-3.5 text-gray-400 text-xs">{{ $event->id }}</td>

                    <td class="px-6 py-3.5">
                        @if($event->event_type === 'page_view')
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Page View
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-saffron-700 bg-saffron-50 px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download Click
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-3.5">
                        @if($event->platform === 'android')
                        <span class="inline-flex items-center gap-1 text-xs text-green-700 bg-green-50 px-2 py-0.5 rounded-full font-medium">🤖 Android</span>
                        @elseif($event->platform === 'ios')
                        <span class="inline-flex items-center gap-1 text-xs text-gray-700 bg-gray-100 px-2 py-0.5 rounded-full font-medium"> iOS</span>
                        @else
                        <span class="text-gray-300 text-xs">—</span>
                        @endif
                    </td>

                    <td class="px-6 py-3.5 text-gray-600 font-mono text-xs">
                        {{ $event->ip_address ?? '—' }}
                    </td>

                    <td class="px-6 py-3.5 text-gray-400 text-xs hidden lg:table-cell max-w-[180px] truncate">
                        @if($event->referrer)
                            <span title="{{ $event->referrer }}">{{ $event->referrer }}</span>
                        @else
                            <span class="text-gray-300">Direct</span>
                        @endif
                    </td>

                    <td class="px-6 py-3.5 text-gray-500 text-xs whitespace-nowrap">
                        <span title="{{ $event->created_at->format('d M Y H:i:s') }}">
                            {{ $event->created_at->diffForHumans() }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <p class="text-gray-400 font-medium">No events recorded yet</p>
                            <p class="text-gray-300 text-xs">Events will appear here as visitors land on your page</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function () {
    const labels  = @json($chart['labels']);
    const views   = @json($chart['views']);
    const clicks  = @json($chart['clicks']);

    const defaults = {
        tension: 0.4,
        fill: true,
        pointRadius: 3,
        pointHoverRadius: 5,
        borderWidth: 2,
    };

    new Chart(document.getElementById('trafficChart'), {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    ...defaults,
                    label: 'Page Views',
                    data: views,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59,130,246,0.08)',
                    pointBackgroundColor: '#3B82F6',
                },
                {
                    ...defaults,
                    label: 'Download Clicks',
                    data: clicks,
                    borderColor: '#FF6B35',
                    backgroundColor: 'rgba(255,107,53,0.08)',
                    pointBackgroundColor: '#FF6B35',
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { intersect: false, mode: 'index' },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1f2937',
                    titleColor: '#f9fafb',
                    bodyColor: '#d1d5db',
                    padding: 12,
                    cornerRadius: 10,
                },
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        color: '#9ca3af',
                        font: { size: 10 },
                        maxTicksLimit: 10,
                    },
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.04)' },
                    ticks: {
                        color: '#9ca3af',
                        font: { size: 11 },
                        precision: 0,
                    },
                },
            },
        },
    });
})();
</script>
@endpush
