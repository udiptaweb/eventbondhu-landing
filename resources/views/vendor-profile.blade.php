@extends('layouts.landing')

@php
    $vendor       = $profile['vendor'];
    $cat_key      = $vendor['category']['key']   ?? 'default';
    $cat_label    = $vendor['category']['label'] ?? 'Service Provider';
    $cat_icon     = $vendor['category']['icon']  ?? '';
    $business     = $vendor['business_name']     ?? $profile['name'] ?? 'Vendor';
    $owner        = $vendor['owner_name']        ?? $profile['name'] ?? '';
    $description  = $vendor['description']       ?? null;
    $rating       = (float)($vendor['average_rating'] ?? 0);
    $total_rev    = (int)($vendor['total_reviews'] ?? 0);
    $total_book   = (int)($vendor['total_bookings'] ?? 0);
    $experience   = $vendor['years_experience']  ?? null;
    $service_areas= $vendor['service_areas']     ?? [];
    $portfolio    = $vendor['portfolio_images']  ?? [];
    $packages     = $vendor['packages']          ?? [];
    $reviews      = $vendor['reviews']           ?? [];
    $phone        = $vendor['business_phone']    ?? null;
    $whatsapp     = $vendor['whatsapp_number']   ?? null;
    $website      = $vendor['website']           ?? null;
    $facebook     = $vendor['facebook_url']      ?? null;
    $instagram    = $vendor['instagram_url']     ?? null;
    $address      = $vendor['business_address']  ?? null;
    $is_verified  = ($profile['is_verified'] ?? false) || ($vendor['is_verified'] ?? false);
    $is_featured  = $vendor['is_featured']       ?? false;
    $is_online    = $profile['is_online']        ?? false;
    $cover_photo  = $profile['cover_photo']      ?? null;
    $avatar       = $profile['profile_photo']    ?? null;
    $location     = $profile['location']         ?? null;
    $member_since = $profile['member_since']     ?? null;
    $username     = $profile['username']         ?? '';

    // ─── Per-category visual themes ─────────────────────────────────────────
    $themes = [
        'photographer' => [
            'gradient'   => 'linear-gradient(160deg,#0a0a0a 0%,#1c1c2e 50%,#2d1b69 100%)',
            'overlay'    => 'rgba(0,0,0,0.55)',
            'accent'     => '#F59E0B',
            'body_bg'    => '#f9f8ff',
            'section_bg' => '#0f0f1a',
            'dark'       => true,
            'body_dark'  => false,
            'body_text'  => '#1c1c2e',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(245,158,11,.15)',
            'badge_color'=> '#F59E0B',
            'badge_bdr'  => 'rgba(245,158,11,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#F59E0B,#D97706)',
            'btn_color'  => '#000',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.72)',
            'card_bg'    => '#1a1a2e',
            'card_bdr'   => '#2a2a4e',
            'card_text'  => '#e5e5f7',
            'card_muted' => 'rgba(229,229,247,0.55)',
            'pkg_bg'     => '#1e1e38',
            'emoji'      => '📷',
            'ttl_cls'    => 'color:#F59E0B',
            'pkg_title'  => 'Packages',
            'cta_txt'    => 'Book your wedding photographer through Event Bondhu app — compare portfolios, read reviews & confirm in minutes.',
        ],
        'videographer' => [
            'gradient'   => 'linear-gradient(160deg,#0d0d0d 0%,#0d1b2a 50%,#163551 100%)',
            'overlay'    => 'rgba(0,0,0,0.60)',
            'accent'     => '#60A5FA',
            'body_bg'    => '#f0f4ff',
            'section_bg' => '#0a0f1e',
            'dark'       => true,
            'body_dark'  => false,
            'body_text'  => '#0d1b2a',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(96,165,250,.15)',
            'badge_color'=> '#60A5FA',
            'badge_bdr'  => 'rgba(96,165,250,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#3B82F6,#2563EB)',
            'btn_color'  => '#fff',
            'hero_text'  => '#e0f2fe',
            'hero_sub'   => 'rgba(224,242,254,0.72)',
            'card_bg'    => '#0f1729',
            'card_bdr'   => '#1e2a4a',
            'card_text'  => '#dbeafe',
            'card_muted' => 'rgba(219,234,254,0.55)',
            'pkg_bg'     => '#131d35',
            'emoji'      => '🎬',
            'ttl_cls'    => 'color:#60A5FA',
            'pkg_title'  => 'Packages',
            'cta_txt'    => 'Watch reels, compare cinematic styles & lock your wedding filmmaker — all through Event Bondhu app.',
        ],
        'makeup_artist' => [
            'gradient'   => 'linear-gradient(160deg,#6b2737 0%,#c06080 50%,#f9a8b4 100%)',
            'overlay'    => 'rgba(107,39,55,0.32)',
            'accent'     => '#E91E63',
            'body_bg'    => '#fff0f3',
            'section_bg' => '#fff5f7',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(233,30,99,.1)',
            'badge_color'=> '#E91E63',
            'badge_bdr'  => 'rgba(233,30,99,.25)',
            'btn_grad'   => 'linear-gradient(135deg,#E91E63,#C2185B)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.85)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#fce4ec',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#fff5f7',
            'emoji'      => '💄',
            'ttl_cls'    => 'color:#E91E63',
            'pkg_title'  => 'Packages',
            'cta_txt'    => 'Browse bridal portfolios & book your dream makeup artist on Event Bondhu — trusted by thousands of brides.',
        ],
        'beautician' => [
            'gradient'   => 'linear-gradient(160deg,#6b1a5e 0%,#9c27b0 50%,#e040fb 100%)',
            'overlay'    => 'rgba(107,26,94,0.38)',
            'accent'     => '#9333EA',
            'body_bg'    => '#fdf4ff',
            'section_bg' => '#faf5ff',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(147,51,234,.1)',
            'badge_color'=> '#9333EA',
            'badge_bdr'  => 'rgba(147,51,234,.25)',
            'btn_grad'   => 'linear-gradient(135deg,#9333EA,#7C3AED)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.85)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#f3e8ff',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#faf5ff',
            'emoji'      => '💅',
            'ttl_cls'    => 'color:#9333EA',
            'pkg_title'  => 'Packages',
            'cta_txt'    => 'Book complete bridal beauty services for your big day — hair, nails, saree draping & more on Event Bondhu.',
        ],
        'mandap_designer' => [
            'gradient'   => 'linear-gradient(160deg,#1a0533 0%,#4a0082 45%,#8e24aa 80%,#ab47bc 100%)',
            'overlay'    => 'rgba(26,5,51,0.45)',
            'accent'     => '#FFB300',
            'body_bg'    => '#fdf9ff',
            'section_bg' => '#faf5ff',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(255,179,0,.15)',
            'badge_color'=> '#E65100',
            'badge_bdr'  => 'rgba(255,152,0,.35)',
            'btn_grad'   => 'linear-gradient(135deg,#7B1FA2,#6A1B9A)',
            'btn_color'  => '#FFB300',
            'hero_text'  => '#FFD54F',
            'hero_sub'   => 'rgba(255,213,79,0.85)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#ede9fe',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#f5f0ff',
            'emoji'      => '🏛️',
            'ttl_cls'    => 'color:#7B1FA2',
            'pkg_title'  => 'Mandap Packages',
            'cta_txt'    => 'Browse stunning mandap designs & book your perfect wedding setup — floral, themed or classic on Event Bondhu.',
        ],
        'caterer' => [
            'gradient'   => 'linear-gradient(160deg,#7c2d12 0%,#c2410c 50%,#fb923c 100%)',
            'overlay'    => 'rgba(124,45,18,0.38)',
            'accent'     => '#16A34A',
            'body_bg'    => '#fffbf5',
            'section_bg' => '#fff7ed',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(22,163,74,.1)',
            'badge_color'=> '#16A34A',
            'badge_bdr'  => 'rgba(22,163,74,.25)',
            'btn_grad'   => 'linear-gradient(135deg,#EA580C,#C2410C)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.85)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#fed7aa',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#fff7ed',
            'emoji'      => '🍽️',
            'ttl_cls'    => 'color:#EA580C',
            'pkg_title'  => 'Menu Packages',
            'cta_txt'    => 'Compare menus, price-per-plate & reviews — book your wedding caterer easily on Event Bondhu app.',
        ],
        'priest' => [
            'gradient'   => 'linear-gradient(160deg,#78350f 0%,#b45309 40%,#d97706 70%,#fbbf24 100%)',
            'overlay'    => 'rgba(120,53,15,0.28)',
            'accent'     => '#D97706',
            'body_bg'    => '#fefce8',
            'section_bg' => '#fffbeb',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(217,119,6,.12)',
            'badge_color'=> '#D97706',
            'badge_bdr'  => 'rgba(217,119,6,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#D97706,#B45309)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.9)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#fde68a',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#fffbeb',
            'emoji'      => '🪔',
            'ttl_cls'    => 'color:#B45309',
            'pkg_title'  => 'Ceremony Packages',
            'cta_txt'    => 'Book an experienced pandit for your wedding ceremonies, pujas & rituals through Event Bondhu app.',
        ],
        'florist' => [
            'gradient'   => 'linear-gradient(160deg,#052e16 0%,#166534 45%,#16a34a 75%,#86efac 100%)',
            'overlay'    => 'rgba(5,46,22,0.38)',
            'accent'     => '#16A34A',
            'body_bg'    => '#f7fff9',
            'section_bg' => '#f0fdf4',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(22,163,74,.1)',
            'badge_color'=> '#16A34A',
            'badge_bdr'  => 'rgba(22,163,74,.25)',
            'btn_grad'   => 'linear-gradient(135deg,#16A34A,#15803D)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.9)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#bbf7d0',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#f0fdf4',
            'emoji'      => '🌸',
            'ttl_cls'    => 'color:#15803D',
            'pkg_title'  => 'Floral Packages',
            'cta_txt'    => 'Discover stunning floral arrangements for your wedding — from bridal bouquets to stage decor on Event Bondhu.',
        ],
        'dj' => [
            'gradient'   => 'linear-gradient(160deg,#0d0d1a 0%,#1e1b4b 40%,#4c1d95 75%,#7c3aed 100%)',
            'overlay'    => 'rgba(13,13,26,0.5)',
            'accent'     => '#A78BFA',
            'body_bg'    => '#0d0d1a',
            'section_bg' => '#0f0f1e',
            'dark'       => true,
            'body_dark'  => true,
            'body_text'  => '#e5e5f7',
            'body_muted' => 'rgba(229,229,247,0.6)',
            'badge_bg'   => 'rgba(167,139,250,.15)',
            'badge_color'=> '#A78BFA',
            'badge_bdr'  => 'rgba(167,139,250,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#7C3AED,#6D28D9)',
            'btn_color'  => '#fff',
            'hero_text'  => '#c4b5fd',
            'hero_sub'   => 'rgba(196,181,253,0.72)',
            'card_bg'    => '#1a1a2e',
            'card_bdr'   => '#2d2a5e',
            'card_text'  => '#e5e5f7',
            'card_muted' => 'rgba(229,229,247,0.55)',
            'pkg_bg'     => '#1e1e38',
            'emoji'      => '🎧',
            'ttl_cls'    => 'color:#A78BFA',
            'pkg_title'  => 'Packages',
            'cta_txt'    => 'Book the perfect DJ or live band for your sangeet & reception night through Event Bondhu app.',
        ],
        'decorator' => [
            'gradient'   => 'linear-gradient(160deg,#1e1b4b 0%,#4c1d95 40%,#9333ea 75%,#c026d3 100%)',
            'overlay'    => 'rgba(30,27,75,0.45)',
            'accent'     => '#F59E0B',
            'body_bg'    => '#fdf9ff',
            'section_bg' => '#faf5ff',
            'dark'       => false,
            'body_dark'  => false,
            'body_text'  => '#1f2937',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(245,158,11,.15)',
            'badge_color'=> '#D97706',
            'badge_bdr'  => 'rgba(245,158,11,.35)',
            'btn_grad'   => 'linear-gradient(135deg,#9333EA,#7E22CE)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fef3c7',
            'hero_sub'   => 'rgba(254,243,199,0.85)',
            'card_bg'    => '#fff',
            'card_bdr'   => '#e9d5ff',
            'card_text'  => '#1f2937',
            'card_muted' => '#6b7280',
            'pkg_bg'     => '#faf5ff',
            'emoji'      => '✨',
            'ttl_cls'    => 'color:#7E22CE',
            'pkg_title'  => 'Decoration Packages',
            'cta_txt'    => 'Browse themed décor ideas & book your event decorator for an unforgettable venue on Event Bondhu.',
        ],
        'light_sound' => [
            'gradient'   => 'linear-gradient(160deg,#0c1445 0%,#0c4a6e 40%,#0369a1 70%,#0ea5e9 100%)',
            'overlay'    => 'rgba(12,20,69,0.5)',
            'accent'     => '#0EA5E9',
            'body_bg'    => '#f0f9ff',
            'section_bg' => '#0f1729',
            'dark'       => true,
            'body_dark'  => false,
            'body_text'  => '#0c1445',
            'body_muted' => '#6b7280',
            'badge_bg'   => 'rgba(14,165,233,.12)',
            'badge_color'=> '#0EA5E9',
            'badge_bdr'  => 'rgba(14,165,233,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#0284C7,#0369A1)',
            'btn_color'  => '#fff',
            'hero_text'  => '#e0f2fe',
            'hero_sub'   => 'rgba(224,242,254,0.72)',
            'card_bg'    => '#0f1f35',
            'card_bdr'   => '#1e3a5a',
            'card_text'  => '#e0f2fe',
            'card_muted' => 'rgba(224,242,254,0.55)',
            'pkg_bg'     => '#122035',
            'emoji'      => '🔊',
            'ttl_cls'    => 'color:#0EA5E9',
            'pkg_title'  => 'AV Packages',
            'cta_txt'    => 'Professional lighting & sound setups for your event — book verified AV experts on Event Bondhu app.',
        ],
        'entertainer' => [
            'gradient'   => 'linear-gradient(160deg,#1a0000 0%,#7c0000 40%,#dc2626 75%,#f87171 100%)',
            'overlay'    => 'rgba(26,0,0,0.5)',
            'accent'     => '#FB923C',
            'body_bg'    => '#1a0505',
            'section_bg' => '#0f0505',
            'dark'       => true,
            'body_dark'  => true,
            'body_text'  => '#fef2f2',
            'body_muted' => 'rgba(254,242,242,0.6)',
            'badge_bg'   => 'rgba(251,146,60,.15)',
            'badge_color'=> '#FB923C',
            'badge_bdr'  => 'rgba(251,146,60,.3)',
            'btn_grad'   => 'linear-gradient(135deg,#DC2626,#B91C1C)',
            'btn_color'  => '#fff',
            'hero_text'  => '#fff',
            'hero_sub'   => 'rgba(255,255,255,0.78)',
            'card_bg'    => '#2d0505',
            'card_bdr'   => '#5a0a0a',
            'card_text'  => '#fef2f2',
            'card_muted' => 'rgba(254,242,242,0.55)',
            'pkg_bg'     => '#3b0a0a',
            'emoji'      => '🎭',
            'ttl_cls'    => 'color:#FB923C',
            'pkg_title'  => 'Show Packages',
            'cta_txt'    => 'Book unique entertainers for your sangeet, mehendi & reception — browse performer reels on Event Bondhu.',
        ],
    ];

    $default_theme = [
        'gradient'   => 'linear-gradient(160deg,#2d0a1e 0%,#7b1035 40%,#c41e3a 70%,#ff6b35 100%)',
        'overlay'    => 'rgba(45,10,30,0.45)',
        'accent'     => '#F5A623',
        'body_bg'    => '#fff8f3',
        'section_bg' => '#fff3ea',
        'dark'       => false,
        'body_dark'  => false,
        'body_text'  => '#1f2937',
        'body_muted' => '#6b7280',
        'badge_bg'   => 'rgba(245,166,35,.15)',
        'badge_color'=> '#c41e3a',
        'badge_bdr'  => 'rgba(196,30,58,.3)',
        'btn_grad'   => 'linear-gradient(135deg,#FF6B35,#C41E3A)',
        'btn_color'  => '#fff',
        'hero_text'  => '#fff',
        'hero_sub'   => 'rgba(255,255,255,0.85)',
        'card_bg'    => '#fff',
        'card_bdr'   => '#ffe8d4',
        'card_text'  => '#1f2937',
        'card_muted' => '#6b7280',
        'pkg_bg'     => '#fff8f3',
        'emoji'      => '⭐',
        'ttl_cls'    => 'color:#c41e3a',
        'pkg_title'  => 'Packages',
        'cta_txt'    => 'Find, compare & book verified event artisans for your special day — all through Event Bondhu app.',
    ];

    $t   = $themes[$cat_key] ?? $default_theme;
    $dark = $t['dark'];

    // Star helpers
    $stars_full  = (int) floor($rating);
    $stars_half  = (($rating - floor($rating)) >= 0.4) ? 1 : 0;
    $stars_empty = max(0, 5 - $stars_full - $stars_half);

    $play_store_url = route('home') . '#download';
    $whatsapp_url   = $whatsapp ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp) : null;

    $schema_type = match($cat_key) {
        'photographer', 'videographer' => 'Photographer',
        'caterer'                      => 'FoodEstablishment',
        default                        => 'LocalBusiness',
    };
@endphp

@section('title', $business . ' – ' . $cat_label . ' in ' . ($location ?? 'India') . ' | Event Bondhu')
@section('meta_description', ($description ? \Illuminate\Support\Str::limit($description, 155) : 'Book ' . $business . ', a verified ' . $cat_label . ' on Event Bondhu app.'))
@section('canonical', url('/' . $username))

@section('json_ld')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "{{ $schema_type }}",
    "name": "{{ addslashes($business) }}",
    "description": "{{ addslashes(\Illuminate\Support\Str::limit($description ?? '', 200)) }}",
    "url": "{{ url('/' . $username) }}",
    @if($avatar) "image": "{{ $avatar }}", @endif
    @if($phone) "telephone": "{{ $phone }}", @endif
    @if($address) "address": { "@@type": "PostalAddress", "addressLocality": "{{ addslashes($address) }}", "addressCountry": "IN" }, @endif
    @if($rating > 0)
    "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "{{ number_format($rating, 1) }}",
        "reviewCount": "{{ $total_rev }}",
        "bestRating": "5",
        "worstRating": "1"
    },
    @endif
    "provider": { "@@type": "Organization", "name": "Event Bondhu", "url": "{{ url('/') }}" }
}
</script>
@endsection

@section('content')
<div style="background:{{ $t['body_bg'] }}; min-height:100vh; overflow-x:hidden;">

{{-- ══ NAV ════════════════════════════════════════════════ --}}
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto">
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}#categories"
               class="hidden sm:block text-sm font-medium text-gray-500 hover:text-saffron-600 transition-colors">
                All Services
            </a>
            <a href="{{ $play_store_url }}"
               class="inline-flex items-center gap-1.5 text-sm font-semibold px-4 py-2 rounded-full text-white shadow-sm transition-all hover:opacity-90 hover:scale-105"
               style="background:{{ $t['btn_grad'] }}; color:{{ $t['btn_color'] }}"
               data-track="android">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                <span class="hidden sm:inline">Get the App</span>
                <span class="sm:hidden">App</span>
            </a>
        </div>
    </div>
</nav>


{{-- ══ HERO ════════════════════════════════════════════════ --}}
<section class="relative overflow-hidden" style="min-height:65vh;">

    {{-- Background: cover photo OR gradient --}}
    @if($cover_photo)
        <img src="{{ $cover_photo }}" alt="{{ $business }}" loading="eager"
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0" style="background:{{ $t['overlay'] }}; backdrop-filter:blur(1px)"></div>
    @else
        <div class="absolute inset-0" style="background:{{ $t['gradient'] }}"></div>
        {{-- decorative blobs --}}
        <div class="absolute top-0 right-0 w-64 h-64 sm:w-96 sm:h-96 rounded-full opacity-20 blur-3xl translate-x-1/3 -translate-y-1/4"
             style="background:{{ $t['accent'] }}"></div>
        <div class="absolute bottom-0 left-0 w-56 h-56 sm:w-80 sm:h-80 rounded-full opacity-15 blur-3xl -translate-x-1/3 translate-y-1/4"
             style="background:{{ $t['accent'] }}"></div>
    @endif

    {{-- Breadcrumb --}}
    <div class="relative z-10 pt-8 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <nav class="flex items-center gap-1.5 text-xs flex-wrap" style="color:{{ $t['hero_sub'] }}">
                <a href="{{ route('home') }}" class="hover:opacity-100 opacity-75 transition-opacity shrink-0">Home</a>
                <span class="opacity-50 shrink-0">/</span>
                <a href="{{ route('service.page', $cat_key) }}" class="hover:opacity-100 opacity-75 transition-opacity truncate max-w-30">{{ $cat_label }}</a>
                <span class="opacity-50 shrink-0">/</span>
                <span class="opacity-75 truncate max-w-25">{{ $username }}</span>
            </nav>
        </div>
    </div>

    {{-- Profile content --}}
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 pt-8 pb-12">
        <div class="flex flex-col sm:flex-row items-start sm:items-end gap-6">

            {{-- Avatar --}}
            <div class="relative shrink-0">
                <div class="w-28 h-28 sm:w-36 sm:h-36 rounded-2xl overflow-hidden shadow-2xl"
                     style="border: 3px solid {{ $t['accent'] }}; background: {{ $t['card_bg'] }}">
                    @if($avatar)
                        <img src="{{ $avatar }}" alt="{{ $owner }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-4xl sm:text-5xl">
                            {{ $t['emoji'] }}
                        </div>
                    @endif
                </div>
                {{-- Online dot --}}
                @if($is_online)
                <span class="absolute bottom-1 right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full shadow"></span>
                @endif
            </div>

            {{-- Info --}}
            <div class="flex-1 min-w-0">
                {{-- Category + badges row --}}
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1 rounded-full"
                          style="background:{{ $t['badge_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                        @if($cat_icon)<span>{{ $cat_icon }}</span>@endif
                        {{ $cat_label }}
                    </span>
                    @if($is_verified)
                    <span class="inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full bg-green-500/20 text-green-300 border border-green-400/30">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Verified
                    </span>
                    @endif
                    @if($is_featured)
                    <span class="inline-flex items-center gap-1 text-xs font-semibold px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-300 border border-yellow-400/30">
                        ⭐ Featured
                    </span>
                    @endif
                    @if($is_online)
                    <span class="inline-flex items-center gap-1.5 text-xs px-2.5 py-1 rounded-full bg-green-500/15 text-green-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse inline-block"></span>
                        Online Now
                    </span>
                    @endif
                </div>

                {{-- Business name --}}
                <h1 class="font-display text-2xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-1 wrap-break-word"
                    style="color:{{ $t['hero_text'] }}">
                    {{ $business }}
                </h1>

                @if($owner && $owner !== $business)
                <p class="text-sm sm:text-base mb-3 wrap-break-word" style="color:{{ $t['hero_sub'] }}">
                    by {{ $owner }}
                </p>
                @endif

                {{-- Rating --}}
                @if($rating > 0)
                <div class="flex items-center gap-2 mb-3">
                    <div class="flex items-center gap-0.5">
                        @for($i = 0; $i < $stars_full; $i++)
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                        @if($stars_half)
                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" opacity=".4"/><path d="M9.049 2.927c.3-.921 1.603 0 0 0v14.146l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" style="clip-path:inset(0 50% 0 0)"/></svg>
                        @endif
                        @for($i = 0; $i < $stars_empty; $i++)
                        <svg class="w-5 h-5 text-white/30" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <span class="text-sm font-semibold" style="color:{{ $t['hero_text'] }}">{{ number_format($rating, 1) }}</span>
                    @if($total_rev > 0)
                    <span class="text-sm" style="color:{{ $t['hero_sub'] }}">({{ $total_rev }} {{ $total_rev === 1 ? 'review' : 'reviews' }})</span>
                    @endif
                </div>
                @endif

                {{-- Location --}}
                @if($location)
                <div class="flex items-center gap-1.5 text-sm" style="color:{{ $t['hero_sub'] }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $location }}
                </div>
                @endif
            </div>

        </div>
    </div>

    {{-- Wave bottom --}}
    <div class="absolute bottom-0 left-0 right-0 wave-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 40" preserveAspectRatio="none">
            <path fill="{{ $t['body_bg'] }}" d="M0,20 C360,40 1080,0 1440,20 L1440,40 L0,40 Z"/>
        </svg>
    </div>
</section>


{{-- ══ QUICK STATS ═════════════════════════════════════════ --}}
<section class="relative -mt-2 pb-2">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
            @if($rating > 0)
            <div class="rounded-2xl p-4 text-center shadow-sm reveal"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                <div class="text-2xl sm:text-3xl font-black mb-0.5" style="{{ $t['ttl_cls'] }}">
                    {{ number_format($rating, 1) }}
                </div>
                <div class="text-xs font-medium" style="color:{{ $t['card_muted'] }}">Rating</div>
            </div>
            @endif
            @if($total_rev > 0)
            <div class="rounded-2xl p-4 text-center shadow-sm reveal delay-100"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                <div class="text-2xl sm:text-3xl font-black mb-0.5" style="{{ $t['ttl_cls'] }}">{{ $total_rev }}</div>
                <div class="text-xs font-medium" style="color:{{ $t['card_muted'] }}">Reviews</div>
            </div>
            @endif
            @if($experience)
            <div class="rounded-2xl p-4 text-center shadow-sm reveal delay-200"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                <div class="text-2xl sm:text-3xl font-black mb-0.5" style="{{ $t['ttl_cls'] }}">{{ $experience }}+</div>
                <div class="text-xs font-medium" style="color:{{ $t['card_muted'] }}">Yrs Exp.</div>
            </div>
            @endif
            @if(count($service_areas) > 0)
            <div class="rounded-2xl p-4 text-center shadow-sm reveal delay-300"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                <div class="text-2xl sm:text-3xl font-black mb-0.5" style="{{ $t['ttl_cls'] }}">{{ count($service_areas) }}</div>
                <div class="text-xs font-medium" style="color:{{ $t['card_muted'] }}">Service Areas</div>
            </div>
            @elseif($total_book > 0)
            <div class="rounded-2xl p-4 text-center shadow-sm reveal delay-300"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                <div class="text-2xl sm:text-3xl font-black mb-0.5" style="{{ $t['ttl_cls'] }}">{{ $total_book }}</div>
                <div class="text-xs font-medium" style="color:{{ $t['card_muted'] }}">Bookings</div>
            </div>
            @endif
        </div>
    </div>
</section>


{{-- ══ ABOUT ═══════════════════════════════════════════════ --}}
<section class="py-10 sm:py-14" style="background:{{ $t['body_bg'] }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="grid sm:grid-cols-3 gap-8">

            {{-- Description --}}
            <div class="sm:col-span-2 reveal">
                <h2 class="font-display text-2xl sm:text-3xl font-bold mb-4 wrap-break-word" style="{{ $t['ttl_cls'] }}">
                    About {{ $business }}
                </h2>
                @if($description)
                <p class="leading-relaxed text-base wrap-break-word" style="color:{{ $t['body_text'] }}" id="about-text">
                    {{ $description }}
                </p>
                @else
                <p class="leading-relaxed text-base opacity-60 wrap-break-word" style="color:{{ $t['body_text'] }}">
                    Trusted {{ $cat_label }} available for your special occasions.
                </p>
                @endif

                @if(count($service_areas) > 0)
                <div class="mt-5">
                    <p class="text-xs font-semibold uppercase tracking-widest mb-2" style="color:{{ $t['body_muted'] }}">
                        Serves In
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($service_areas as $area)
                        <span class="text-xs px-3 py-1 rounded-full font-medium"
                              style="background:{{ $t['badge_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                            {{ $area }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Meta info --}}
            <div class="space-y-4 reveal delay-200">
                @if($member_since)
                <div class="rounded-xl p-4" style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:{{ $t['card_muted'] }}">Member Since</p>
                    <p class="font-semibold" style="color:{{ $t['card_text'] }}">{{ date('F Y', strtotime($member_since)) }}</p>
                </div>
                @endif
                @if($address)
                <div class="rounded-xl p-4" style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:{{ $t['card_muted'] }}">Address</p>
                    <p class="text-sm leading-snug wrap-break-word" style="color:{{ $t['card_text'] }}">{{ $address }}</p>
                </div>
                @endif
                @if($website)
                <div class="rounded-xl p-4" style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
                    <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:{{ $t['card_muted'] }}">Website</p>
                    <a href="{{ $website }}" target="_blank" rel="nofollow noopener"
                       class="text-sm font-medium underline underline-offset-2 break-all hover:opacity-80 transition-opacity"
                       style="color:{{ $t['accent'] }}">
                        {{ parse_url($website, PHP_URL_HOST) ?: $website }}
                    </a>
                </div>
                @endif
                {{-- Social --}}
                @if($facebook || $instagram)
                <div class="flex gap-3">
                    @if($facebook)
                    <a href="{{ $facebook }}" target="_blank" rel="nofollow noopener"
                       class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-semibold transition-opacity hover:opacity-80"
                       style="background:{{ $t['card_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </a>
                    @endif
                    @if($instagram)
                    <a href="{{ $instagram }}" target="_blank" rel="nofollow noopener"
                       class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-semibold transition-opacity hover:opacity-80"
                       style="background:{{ $t['card_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        Instagram
                    </a>
                    @endif
                </div>
                @endif
            </div>

        </div>
    </div>
</section>


{{-- ══ PORTFOLIO ═══════════════════════════════════════════ --}}
@if(count($portfolio) > 0)
<section class="py-10 sm:py-14" style="background:{{ $t['section_bg'] ?: $t['body_bg'] }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between mb-6 reveal">
            <h2 class="font-display text-2xl sm:text-3xl font-bold" style="{{ $t['ttl_cls'] }}">
                Work Gallery
            </h2>
            <span class="text-xs font-medium px-3 py-1 rounded-full"
                  style="background:{{ $t['badge_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                {{ count($portfolio) }} photos
            </span>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-3" id="portfolio-grid">
            @foreach($portfolio as $idx => $img)
            <button onclick="openLightbox({{ $idx }})"
                    class="relative group overflow-hidden rounded-xl aspect-square cursor-pointer reveal"
                    data-delay="{{ ($idx % 4) * 80 }}"
                    style="background:{{ $t['card_bg'] }}">
                <img src="{{ $img }}" alt="{{ $business }} portfolio {{ $idx + 1 }}"
                     loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                    </svg>
                </div>
            </button>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ══ PACKAGES ════════════════════════════════════════════ --}}
@if(count($packages) > 0)
<section class="py-10 sm:py-14" style="background:{{ $t['body_bg'] }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8 reveal">
            <h2 class="font-display text-2xl sm:text-3xl font-bold mb-2" style="{{ $t['ttl_cls'] }}">
                Packages / Products
            </h2>
            <p class="text-sm" style="color:{{ $t['body_muted'] }}">
                Choose a package that fits your celebration
            </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($packages as $idx => $pkg)
            @php
                $pkg_type   = $pkg['type'] ?? 'service';
                $pkg_image  = $pkg['image'] ?? null;
                $is_product = $pkg_type === 'product';
                $type_label = $is_product ? 'Product' : 'Service';
                $type_icon  = $is_product ? '📦' : '🛎️';
            @endphp
            <div class="rounded-2xl overflow-hidden shadow-sm reveal flex flex-col"
                 style="background:{{ $t['pkg_bg'] }}; border:1px solid {{ $t['card_bdr'] }}; animation-delay:{{ $idx * 80 }}ms">

                {{-- Package image (if present) --}}
                @if($pkg_image)
                <div class="relative w-full aspect-video overflow-hidden">
                    <img src="{{ $pkg_image }}" alt="{{ $pkg['name'] }}"
                         loading="lazy" class="w-full h-full object-cover">
                    {{-- Type badge over image --}}
                    <span class="absolute top-2 left-2 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full"
                          style="background:{{ $t['badge_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}; backdrop-filter:blur(4px)">
                        {{ $type_icon }} {{ $type_label }}
                    </span>
                </div>
                @else
                {{-- Coloured header band with type badge when no image --}}
                <div class="h-1.5" style="background:{{ $t['btn_grad'] }}"></div>
                @endif

                <div class="p-5 flex flex-col flex-1">
                    {{-- Type badge (no image case) --}}
                    @if(!$pkg_image)
                    <span class="inline-flex items-center gap-1 self-start text-xs font-semibold px-2.5 py-0.5 rounded-full mb-2"
                          style="background:{{ $t['badge_bg'] }}; color:{{ $t['badge_color'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                        {{ $type_icon }} {{ $type_label }}
                    </span>
                    @endif

                    <div class="flex items-start justify-between gap-3 mb-3">
                        <h3 class="font-bold text-lg leading-snug" style="color:{{ $t['card_text'] }}">
                            {{ $pkg['name'] }}
                        </h3>
                        @if($pkg['price'])
                        <div class="text-right shrink-0">
                            <div class="font-black text-xl" style="{{ $t['ttl_cls'] }}">
                                ₹{{ number_format($pkg['price']) }}
                            </div>
                            @if($pkg['duration'])
                            <div class="text-xs" style="color:{{ $t['card_muted'] }}">{{ $pkg['duration'] }}</div>
                            @endif
                        </div>
                        @endif
                    </div>

                    @if($pkg['description'])
                    <p class="text-sm leading-relaxed mb-4" style="color:{{ $t['card_muted'] }}">
                        {{ $pkg['description'] }}
                    </p>
                    @endif

                    @if(!empty($pkg['inclusions']))
                    <ul class="space-y-1.5 mb-5">
                        @foreach($pkg['inclusions'] as $item)
                        <li class="flex items-start gap-2 text-sm" style="color:{{ $t['card_text'] }}">
                            <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24" style="color:{{ $t['accent'] }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <a href="{{ $play_store_url }}" data-track="android"
                       class="block w-full text-center py-2.5 rounded-xl text-sm font-semibold transition-all hover:opacity-90 hover:scale-[1.02] mt-auto"
                       style="background:{{ $t['btn_grad'] }}; color:{{ $t['btn_color'] }}">
                        {{ $is_product ? 'Order on App' : 'Book on App' }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ══ APP DOWNLOAD BANNER ═════════════════════════════════ --}}
<section class="py-14 sm:py-16 relative overflow-hidden"
         style="background:linear-gradient(135deg,#2d0a1e 0%,#7b1035 30%,#c41e3a 60%,#ff6b35 85%,#f5a623 100%)">
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-72 sm:w-96 h-72 sm:h-96 rounded-full bg-white/5 blur-3xl"></div>
        <div class="absolute top-6 right-8 w-4 h-4 rounded-full bg-yellow-300/50 animate-float"></div>
        <div class="absolute bottom-8 left-12 w-3 h-3 rounded-full bg-white/30 animate-float2"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 text-center text-white reveal">
        <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-2 text-xs sm:text-sm mb-4 flex-wrap justify-center">
            <span class="text-yellow-300">📱</span>
            Free Download · No Subscription
        </div>
        <h2 class="font-display text-3xl sm:text-4xl font-bold mb-3">
            Book <span class="gradient-text-gold">{{ \Illuminate\Support\Str::limit($business, 25) }}</span><br class="hidden sm:block">
            on Event Bondhu App
        </h2>
        <p class="text-white/75 mb-6 max-w-xl mx-auto text-sm sm:text-base">
            {{ $t['cta_txt'] }}
        </p>
        <div class="flex flex-col gap-4 justify-center items-center px-4 sm:px-0">
            <a href="{{ $play_store_url }}"
               class="btn-download inline-flex items-center gap-3 bg-white text-gray-900 px-5 sm:px-7 py-3.5 rounded-2xl font-semibold shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300 w-full sm:w-auto justify-center"
               data-track="android">
                <svg class="w-7 h-7 shrink-0" viewBox="0 0 24 24">
                    <path fill="#00c853" d="M3.18 23.76c.33.18.7.18 1.06-.01l12.45-7.19-2.89-2.89z"/>
                    <path fill="#ea4335" d="M20.5 12.5c0-.66-.37-1.24-.91-1.56l-2.97-1.71-3.17 3.17 3.17 3.17 2.98-1.72c.54-.32.9-.9.9-1.35z"/>
                    <path fill="#4285f4" d="M.5 1.37C.19 1.7 0 2.21 0 2.88v18.24c0 .67.19 1.18.5 1.51l.08.08 10.22-10.22V12L.59 1.29z"/>
                    <path fill="#fbbc04" d="M16.69 7.44l-3.37-1.94L10.22 8.6l3.13 3.13 3.34-1.94c.96-.54.96-1.8 0-2.35z"/>
                </svg>
                <div class="text-left">
                    <div class="text-xs text-gray-400 uppercase tracking-wider">GET IT ON</div>
                    <div class="text-base font-black">Google Play</div>
                </div>
            </a>
            <p class="text-white/50 text-xs">
                Available in Assam, West Bengal & across India
            </p>
        </div>
    </div>
</section>


{{-- ══ REVIEWS ═════════════════════════════════════════════ --}}
@if(count($reviews) > 0)
<section class="py-10 sm:py-14" style="background:{{ $t['section_bg'] ?: $t['body_bg'] }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 reveal">
            <div>
                <h2 class="font-display text-2xl sm:text-3xl font-bold mb-1" style="{{ $t['ttl_cls'] }}">
                    Customer Reviews
                </h2>
                @if($rating > 0)
                <div class="flex items-center gap-2">
                    {{-- mini star bar --}}
                    <div class="relative inline-flex leading-none text-2xl">
                        <span style="color:{{ $t['dark'] ? '#374151' : '#e5e7eb' }}">★★★★★</span>
                        <span class="absolute inset-0 overflow-hidden" style="width:{{ ($rating / 5) * 100 }}%; color:#FBBF24">★★★★★</span>
                    </div>
                    <span class="font-bold text-lg" style="{{ $t['ttl_cls'] }}">{{ number_format($rating, 1) }}</span>
                    <span class="text-sm" style="color:{{ $t['body_muted'] }}">based on {{ $total_rev }} reviews</span>
                </div>
                @endif
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
            @foreach($reviews as $idx => $rev)
            <div class="rounded-2xl p-5 reveal"
                 style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}; animation-delay:{{ $idx * 60 }}ms">
                <div class="flex items-start gap-3 mb-3">
                    {{-- Reviewer avatar --}}
                    <div class="w-10 h-10 rounded-full overflow-hidden shrink-0"
                         style="background:{{ $t['badge_bg'] }}; border:1px solid {{ $t['badge_bdr'] }}">
                        @if($rev['reviewer_photo'])
                        <img src="{{ $rev['reviewer_photo'] }}" alt="{{ $rev['reviewer_name'] }}"
                             loading="lazy" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-sm font-bold"
                             style="color:{{ $t['badge_color'] }}">
                            {{ strtoupper(substr($rev['reviewer_name'] ?? 'A', 0, 1)) }}
                        </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm leading-tight" style="color:{{ $t['card_text'] }}">
                            {{ $rev['reviewer_name'] ?? 'Customer' }}
                        </p>
                        <div class="flex items-center gap-1 mt-0.5">
                            @for($s = 1; $s <= 5; $s++)
                            <svg class="w-3.5 h-3.5" fill="{{ $s <= $rev['rating'] ? '#FBBF24' : ($t['dark'] ? '#374151' : '#e5e7eb') }}"
                                 viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                            <span class="text-xs ml-1" style="color:{{ $t['card_muted'] }}">
                                {{ date('M Y', strtotime($rev['created_at'])) }}
                            </span>
                        </div>
                    </div>
                </div>

                @if($rev['review_text'])
                <p class="text-sm leading-relaxed wrap-break-word" style="color:{{ $t['card_muted'] }}">
                    "{{ $rev['review_text'] }}"
                </p>
                @endif

                @if($rev['vendor_response'])
                <div class="mt-3 pl-3 rounded-r-lg text-xs leading-relaxed"
                     style="border-left:2px solid {{ $t['accent'] }}; color:{{ $t['card_muted'] }}">
                    <span class="font-semibold" style="color:{{ $t['badge_color'] }}">Response: </span>
                    {{ $rev['vendor_response'] }}
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ══ CONTACT / BOOK ══════════════════════════════════════ --}}
<section class="py-10 sm:py-14" style="background:{{ $t['body_bg'] }}">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8 reveal">
            <h2 class="font-display text-2xl sm:text-3xl font-bold mb-2" style="{{ $t['ttl_cls'] }}">
                Book {{ \Illuminate\Support\Str::limit($business, 25) }}
            </h2>
            <p class="text-sm" style="color:{{ $t['body_muted'] }}">
                Download the Event Bondhu app to book securely
            </p>
        </div>

        <div class="rounded-2xl p-6 text-center reveal delay-100"
             style="background:{{ $t['card_bg'] }}; border:1px solid {{ $t['card_bdr'] }}">
            <div class="text-3xl mb-2">📱</div>
            <h3 class="font-bold text-base mb-1" style="color:{{ $t['card_text'] }}">Download Event Bondhu</h3>
            <p class="text-xs mb-4" style="color:{{ $t['card_muted'] }}">
                Secure booking · Verified vendors · Instant confirmation
            </p>
            <a href="{{ $play_store_url }}"
               class="btn-download inline-flex items-center gap-3 px-6 py-3 rounded-xl font-semibold text-sm shadow-lg transition-all hover:opacity-90 hover:scale-105"
               style="background:{{ $t['btn_grad'] }}; color:{{ $t['btn_color'] }}"
               data-track="android">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24">
                    <path fill="#00c853" d="M3.18 23.76c.33.18.7.18 1.06-.01l12.45-7.19-2.89-2.89z"/>
                    <path fill="#ea4335" d="M20.5 12.5c0-.66-.37-1.24-.91-1.56l-2.97-1.71-3.17 3.17 3.17 3.17 2.98-1.72c.54-.32.9-.9.9-1.35z"/>
                    <path fill="#4285f4" d="M.5 1.37C.19 1.7 0 2.21 0 2.88v18.24c0 .67.19 1.18.5 1.51l.08.08 10.22-10.22V12L.59 1.29z"/>
                    <path fill="#fbbc04" d="M16.69 7.44l-3.37-1.94L10.22 8.6l3.13 3.13 3.34-1.94c.96-.54.96-1.8 0-2.35z"/>
                </svg>
                Get it on Google Play — Free
            </a>
            <p class="text-xs mt-3 opacity-50" style="color:{{ $t['card_text'] }}">
                iOS coming soon · No hidden fees
            </p>
        </div>
    </div>
</section>


{{-- ══ FOOTER ══════════════════════════════════════════════ --}}
<footer class="py-8 border-t" style="background:{{ $t['body_bg'] }}; border-color:{{ $t['card_bdr'] }}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-8 w-auto"
                     style="{{ $t['body_dark'] ? 'filter:brightness(0) invert(1)' : '' }}">
            </a>
            <nav class="flex flex-wrap justify-center gap-4 text-xs" style="color:{{ $t['body_muted'] }}">
                <a href="{{ route('home') }}" class="hover:opacity-100 opacity-70 transition-opacity">Home</a>
                <a href="{{ route('service.page', $cat_key) }}" class="hover:opacity-100 opacity-70 transition-opacity">All {{ $cat_label }}s</a>
                <a href="{{ route('content.page', 'privacy-policy') }}" class="hover:opacity-100 opacity-70 transition-opacity">Privacy</a>
                <a href="{{ route('content.page', 'terms-conditions') }}" class="hover:opacity-100 opacity-70 transition-opacity">Terms</a>
            </nav>
            <p class="text-xs opacity-40" style="color:{{ $t['body_text'] }}">
                &copy; {{ date('Y') }} Event Bondhu
            </p>
        </div>
    </div>
</footer>

</div>{{-- /body_bg wrapper --}}


{{-- ══ LIGHTBOX ════════════════════════════════════════════ --}}
@if(count($portfolio) > 0)
<div id="lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center p-4"
     style="background:rgba(0,0,0,0.92); backdrop-filter:blur(8px)"
     onclick="if(event.target===this)closeLightbox()">
    <button onclick="closeLightbox()"
            class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors z-10">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <button onclick="prevImage()"
            class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors z-10">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button onclick="nextImage()"
            class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors z-10">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>
    <img id="lightbox-img" src="" alt="{{ $business }}"
         class="max-w-full max-h-[85vh] rounded-xl object-contain shadow-2xl">
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/50 text-sm" id="lightbox-counter"></div>
</div>

<script>
const portfolioImages = @json($portfolio);
let currentIdx = 0;

function openLightbox(idx) {
    currentIdx = idx;
    updateLightbox();
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}
function prevImage() {
    currentIdx = (currentIdx - 1 + portfolioImages.length) % portfolioImages.length;
    updateLightbox();
}
function nextImage() {
    currentIdx = (currentIdx + 1) % portfolioImages.length;
    updateLightbox();
}
function updateLightbox() {
    document.getElementById('lightbox-img').src = portfolioImages[currentIdx];
    document.getElementById('lightbox-counter').textContent = (currentIdx + 1) + ' / ' + portfolioImages.length;
}
document.addEventListener('keydown', e => {
    if (!document.getElementById('lightbox').classList.contains('flex')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
});
</script>
@endif

@endsection
