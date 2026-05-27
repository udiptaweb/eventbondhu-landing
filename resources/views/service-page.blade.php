@extends('layouts.landing')

@php
    $label = $category['label'] ?? $category['name'] ?? 'Service';
    $icon  = $category['icon'] ?? '';
    $key   = $category['key'] ?? '';

    $descriptions = [
        'photographer'    => ['short' => 'Capture every precious moment of your Indian wedding or ceremony with a professional photographer.', 'long' => 'A skilled wedding photographer preserves your most cherished moments — the first glance, the sacred rituals, the joyful celebrations — in timeless images you will treasure for generations. Event Bondhu connects you with verified, portfolio-reviewed photographers who specialise in Indian weddings, engagements, pre-wedding shoots, and religious ceremonies across Assam and beyond.'],
        'videographer'    => ['short' => 'Relive your wedding day with cinematic wedding films crafted by expert videographers.', 'long' => 'Wedding videography goes beyond recording — it is storytelling. From drone aerials to slow-motion highlights, our verified videographers craft cinematic films that capture the emotion, colour, and energy of Indian weddings. Browse reels, compare packages, and book instantly through Event Bondhu.'],
        'makeup_artist'   => ['short' => 'Look your most radiant with a professional bridal makeup artist for your Indian wedding.', 'long' => 'Bridal makeup is an art that blends tradition with trend. Our verified makeup artists are experienced in HD bridal looks, traditional Assamese bridal styles, party makeup, and reception glam. Find artists with genuine reviews and real portfolio photos — no surprises on your big day.'],
        'beautician'      => ['short' => 'Complete beauty services for brides, bridesmaids, and guests at Indian events.', 'long' => 'From bridal skincare to hair styling, nail art, and saree draping — our professional beauticians offer comprehensive beauty packages tailored for Indian weddings and events. Book in advance and get pampered at your venue or their salon.'],
        'mandap_designer' => ['short' => 'Transform your venue with a stunning traditional or modern mandap for your wedding.', 'long' => 'The mandap is the heart of every Hindu wedding ceremony. Our verified mandap designers craft breathtaking setups — from classic floral mandaps to contemporary themed designs — that match your vision and budget. Browse portfolios and book the perfect mandap designer on Event Bondhu.'],
        'caterer'         => ['short' => 'Delight your guests with authentic Indian wedding catering from verified caterers.', 'long' => 'Great food makes a great wedding. Our verified caterers specialise in multi-cuisine Indian wedding menus — from traditional Assamese thalis to North Indian feasts and live counters. Compare menus, pricing per plate, and reviews before making your choice.'],
        'priest'          => ['short' => 'Book an experienced priest or pandit for Vedic wedding ceremonies and religious rituals.', 'long' => 'Every sacred ritual deserves a knowledgeable pandit who can guide you through the ceremony with authenticity and grace. Our verified priests are experienced in Hindu wedding ceremonies, engagement pujas, griha pravesh, naming ceremonies, and more. Book confidently through Event Bondhu.'],
        'florist'         => ['short' => 'Create stunning floral decor for your Indian wedding with a professional florist.', 'long' => 'Flowers set the mood for every Indian wedding — from the entrance garlands to the bridal bouquet and stage decoration. Our verified florists offer fresh, creative arrangements for every budget. Browse their portfolio and book the look you love.'],
        'dj'              => ['short' => 'Set the perfect mood at your Indian wedding with a professional DJ or live band.', 'long' => 'Music makes memories. Whether you want a DJ spinning Bollywood and bhangra hits, or a live band for the sangeet night, Event Bondhu connects you with verified musicians and DJs who know how to keep an Indian wedding crowd celebrating all night.'],
        'decorator'       => ['short' => 'Transform your event venue with creative theme-based decorations for Indian weddings.', 'long' => 'From minimalist chic to grand royal themes, our verified event decorators handle every detail — stage backdrops, table centrepieces, entrance arches, and lighting — to make your venue look extraordinary. Compare styles and book your decorator today.'],
        'light_sound'     => ['short' => 'Professional lighting and sound setup for a flawless Indian wedding event.', 'long' => 'Great lighting and crystal-clear sound are the backbone of every memorable event. Our verified AV professionals provide stage lighting, truss setup, LED screens, and professional sound systems for wedding ceremonies, receptions, and sangeet nights.'],
        'entertainer'     => ['short' => 'Wow your guests with talented entertainers for Indian wedding celebrations.', 'long' => 'Keep the energy high at your sangeet, reception, or mehendi with professional entertainers — folk dancers, stand-up comedians, magicians, and more. Browse performer profiles and reels, and book unique entertainment that your guests will be talking about for years.'],
    ];

    $desc = $descriptions[$key] ?? [
        'short' => "Book verified {$label} professionals for your Indian wedding or event through Event Bondhu.",
        'long'  => "Event Bondhu makes it easy to find, compare, and book trusted {$label} professionals for Indian weddings, ceremonies, and celebrations. Browse verified profiles with real customer reviews and portfolios, then book in minutes — all from one app.",
    ];
@endphp

@section('title', $label . ' Booking for Indian Weddings – Event Bondhu')
@section('meta_description', $desc['short'])
@section('meta_keywords', $label . ', ' . $label . ' booking India, Indian wedding ' . $label . ', wedding ' . $label . ' near me, Event Bondhu ' . $label)
@section('canonical', route('service.page', $key))

@section('json_ld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "name": "{{ $label }} – Event Bondhu",
    "description": "{{ $desc['short'] }}",
    "url": "{{ route('service.page', $key) }}",
    "provider": {
        "@@type": "Organization",
        "name": "Event Bondhu",
        "url": "{{ url('/') }}"
    },
    "areaServed": {
        "@@type": "Country",
        "name": "India"
    },
    "serviceType": "{{ $label }}"
}
</script>
@endsection

@section('content')

{{-- ── Sticky nav ──────────────────────────────────────── --}}
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto">
        </a>
        <div class="flex items-center gap-5">
            <a href="{{ route('home') }}#categories"
               class="hidden sm:block text-sm font-medium text-gray-500 hover:text-saffron-600 transition-colors">
                All Services
            </a>
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-saffron-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Home
            </a>
        </div>
    </div>
</nav>

{{-- ── Hero ────────────────────────────────────────────── --}}
<div class="relative overflow-hidden py-20 sm:py-28"
     style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 30%,#c41e3a 65%,#e84f1a 100%)">
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 rounded-full border border-white/8 animate-spin-slow-rev"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-white/5 blur-3xl"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 text-center">
        {{-- Breadcrumb --}}
        <nav class="flex items-center justify-center gap-2 text-white/50 text-sm mb-6">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('home') }}#categories" class="hover:text-white transition-colors">Services</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white/80">{{ $label }}</span>
        </nav>

        @if($icon)
        <div class="text-6xl mb-5">{{ $icon }}</div>
        @endif

        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-5">
            Book Verified<br>
            <span style="background:linear-gradient(90deg,#ffd700,#ffaa00);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                {{ $label }}s
            </span>
            Near You
        </h1>
        <p class="text-white/75 text-lg sm:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            {{ $desc['short'] }}
        </p>

        <a href="#download"
           class="inline-flex items-center gap-3 bg-white text-crimson-600 font-bold text-base px-8 py-4 rounded-2xl shadow-xl hover:scale-105 transition-transform">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 01-.61-.92V2.734a1 1 0 01.609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-1.303l2.302 2.302a1 1 0 010 1.588l-2.302 2.302L15.396 15l2.302-2.302-2.302-2.302 2.302-2.302zm-3.2-1.303L5.864 2.658l10.937 6.333-2.302 2.11z"/>
            </svg>
            Download Free on Android
        </a>
    </div>
</div>

{{-- ── About this service ──────────────────────────────── --}}
<section class="bg-white py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block text-crimson-500 font-semibold text-sm uppercase tracking-widest mb-3">Why Book via Event Bondhu</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-gray-900 mb-5 leading-snug">
                    Find the Best {{ $label }}<br>for Your Special Day
                </h2>
                <p class="text-gray-600 text-base leading-relaxed mb-8">{{ $desc['long'] }}</p>

                <ul class="space-y-4">
                    @foreach([
                        ['✅', 'Verified Professionals', 'Every ' . $label . ' is background-checked with genuine customer reviews.'],
                        ['⚡', 'Instant Booking',        'Book in under 2 minutes — no calls, no back-and-forth.'],
                        ['📋', 'Compare Portfolios',     'Side-by-side comparison of packages, prices, and past work.'],
                        ['🔒', 'Secure & Transparent',   'No hidden charges. Payments protected end-to-end.'],
                    ] as [$icon, $title, $text])
                    <li class="flex items-start gap-4">
                        <span class="text-xl mt-0.5 shrink-0">{{ $icon }}</span>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">{{ $title }}</p>
                            <p class="text-gray-500 text-sm">{{ $text }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Stats card --}}
            <div class="bg-gradient-to-br from-saffron-50 to-crimson-50 rounded-3xl border border-saffron-100 p-8 sm:p-10">
                <h3 class="font-display text-2xl font-bold text-gray-900 mb-8 text-center">
                    Trusted by Thousands
                </h3>
                <div class="grid grid-cols-2 gap-6">
                    @foreach([
                        ['500+', 'Verified ' . $label . 's'],
                        ['4.8★', 'Average Rating'],
                        ['10K+', 'Bookings Done'],
                        ['24/7', 'Support Available'],
                    ] as [$num, $lbl])
                    <div class="text-center">
                        <div class="text-3xl font-bold text-crimson-600 mb-1">{{ $num }}</div>
                        <div class="text-gray-600 text-sm">{{ $lbl }}</div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-saffron-200 text-center">
                    <p class="text-gray-500 text-sm mb-4">Available across India</p>
                    <div class="flex flex-wrap justify-center gap-2 text-xs font-medium text-gray-600">
                        @foreach(['Guwahati', 'Assam', 'Delhi', 'Mumbai', 'Kolkata', 'Bengaluru'] as $city)
                        <span class="bg-white border border-gray-200 px-3 py-1 rounded-full">{{ $city }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── How it works ─────────────────────────────────────── --}}
<section class="bg-gray-50 py-16 sm:py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-gray-900">
                Book a {{ $label }} in 3 Simple Steps
            </h2>
        </div>
        <div class="grid sm:grid-cols-3 gap-8">
            @foreach([
                ['1', '📲', 'Download the App', 'Get Event Bondhu free on Android from Google Play Store.'],
                ['2', '🔍', 'Browse & Compare',  'Explore verified ' . $label . 's, view portfolios, and compare packages.'],
                ['3', '✅', 'Book Instantly',    'Confirm your booking in seconds — secure and hassle-free.'],
            ] as [$step, $emoji, $title, $text])
            <div class="bg-white rounded-2xl border border-gray-100 p-7 text-center shadow-sm">
                <div class="w-10 h-10 rounded-full bg-crimson-600 text-white font-bold text-lg flex items-center justify-center mx-auto mb-4">{{ $step }}</div>
                <div class="text-4xl mb-3">{{ $emoji }}</div>
                <h3 class="font-bold text-gray-900 mb-2">{{ $title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $text }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Download CTA ─────────────────────────────────────── --}}
<section id="download"
         class="py-16 sm:py-20 relative overflow-hidden"
         style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 40%,#c41e3a 70%,#e84f1a 100%)">
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-56 h-56 rounded-full border border-white/8 animate-spin-slow-rev"></div>
    </div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <div class="text-5xl mb-5">{{ $icon ?: '🎉' }}</div>
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mb-4">
            Ready to Book Your {{ $label }}?
        </h2>
        <p class="text-white/70 text-lg mb-10">
            Download Event Bondhu now and find the perfect {{ $label }} for your special occasion.
        </p>
        <a href="https://play.google.com/store/apps/details?id=com.eventbondhu"
           target="_blank" rel="noopener"
           data-platform="android"
           class="btn-download inline-flex items-center gap-3 bg-white text-gray-900 font-bold text-base px-8 py-4 rounded-2xl shadow-xl hover:scale-105 transition-transform">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Google_Play_Arrow_logo.svg/48px-Google_Play_Arrow_logo.svg.png"
                 alt="Google Play" class="w-7 h-7">
            <span>
                <span class="block text-xs font-normal text-gray-500 leading-none">GET IT ON</span>
                Google Play
            </span>
        </a>
    </div>
</section>

{{-- ── Other services ───────────────────────────────────── --}}
@if(count($categories) > 1)
<section class="bg-white py-14 sm:py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-gray-900 mb-8 text-center">
            Explore Other Services
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $others = array_filter($categories, fn($c) => ($c['key'] ?? '') !== $key);
            $palette = ['from-orange-400 to-orange-600','from-red-400 to-red-600','from-pink-400 to-pink-600',
                        'from-purple-400 to-purple-600','from-amber-400 to-amber-600','from-green-400 to-green-600',
                        'from-blue-400 to-blue-600','from-indigo-400 to-indigo-600','from-teal-400 to-teal-600',
                        'from-cyan-400 to-cyan-600','from-rose-400 to-rose-600','from-yellow-400 to-yellow-600'];
            @endphp
            @foreach(array_values($others) as $i => $other)
            @php
                $oName = $other['label'] ?? $other['name'] ?? '';
                $oIcon = $other['icon'] ?? null;
                $oKey  = $other['key'] ?? '';
                $oGrad = $palette[$i % count($palette)];
            @endphp
            <a href="{{ route('service.page', $oKey) }}"
               class="flex items-center gap-3 bg-gray-50 hover:bg-saffron-50 border border-gray-100 hover:border-saffron-200 rounded-xl p-3.5 transition-colors group">
                @if($oIcon)
                <span class="text-2xl shrink-0">{{ $oIcon }}</span>
                @else
                <div class="w-9 h-9 rounded-lg bg-gradient-to-br {{ $oGrad }} flex items-center justify-center shrink-0">
                    <span class="text-white font-bold text-sm">{{ mb_strtoupper(mb_substr($oName, 0, 1)) }}</span>
                </div>
                @endif
                <span class="text-sm font-semibold text-gray-800 group-hover:text-crimson-600 transition-colors leading-tight">{{ $oName }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── Footer ───────────────────────────────────────────── --}}
<footer class="bg-gray-950 text-white py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-7 w-auto brightness-0 invert opacity-60">
            <span>© {{ date('Y') }} Event Bondhu. All rights reserved.</span>
        </div>
        <div class="flex flex-wrap justify-center gap-5">
            <a href="{{ route('content.page', 'privacy-policy') }}"   class="hover:text-saffron-400 transition-colors">Privacy Policy</a>
            <a href="{{ route('content.page', 'terms-conditions') }}" class="hover:text-saffron-400 transition-colors">Terms & Conditions</a>
            <a href="{{ route('content.page', 'about') }}"            class="hover:text-saffron-400 transition-colors">About</a>
            <a href="{{ route('content.page', 'contact-support') }}"  class="hover:text-saffron-400 transition-colors">Contact</a>
        </div>
    </div>
</footer>

@endsection
