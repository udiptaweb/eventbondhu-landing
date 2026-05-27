@extends('layouts.landing')

@section('content')

{{-- ── Minimal sticky nav ──────────────────────────────────── --}}
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto">
        </a>
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500
                  hover:text-saffron-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Home
        </a>
    </div>
</nav>

{{-- ── Page hero ────────────────────────────────────────────── --}}
<div class="relative overflow-hidden py-14 sm:py-20"
     style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 30%,#c41e3a 65%,#e84f1a 100%)">
    {{-- Decorative rings --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-56 h-56 rounded-full border border-white/8 animate-spin-slow-rev"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-white/50 text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white/80">{{ $title }}</span>
        </nav>

        <h1 class="font-display text-3xl sm:text-4xl font-bold text-white">{{ $title }}</h1>

        @if($content)
        @php
            $updatedAt = $content['data']['updated_at'] ?? $content['updated_at'] ?? null;
        @endphp
        @if($updatedAt)
        <p class="text-white/50 text-sm mt-3 flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Last updated {{ \Carbon\Carbon::parse($updatedAt)->format('d M Y') }}
        </p>
        @endif
        @endif
    </div>
</div>

{{-- ── Main content area ────────────────────────────────────── --}}
<div class="bg-gray-50 min-h-screen py-10 sm:py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        @php
            $body      = $content['data']['content'] ?? $content['content'] ?? null;
            $apiTitle  = $content['data']['title']   ?? $content['title']   ?? null;
        @endphp

        @if($body)
        {{-- Content card --}}
        <article class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 sm:p-12">
            <div class="rich-content">
                {!! $body !!}
            </div>
        </article>

        @elseif($content !== null)
        {{-- API responded but no content field --}}
        <div class="bg-white rounded-2xl shadow-sm border border-amber-100 p-10 text-center">
            <div class="w-14 h-14 rounded-full bg-amber-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-amber-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-gray-700 font-semibold">Content coming soon</p>
            <p class="text-gray-400 text-sm mt-1">This page is being prepared. Please check back shortly.</p>
        </div>

        @else
        {{-- API failed --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">
            <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
            <p class="text-gray-700 font-semibold">Couldn't load content</p>
            <p class="text-gray-400 text-sm mt-1 mb-5">We're having trouble fetching this page right now.</p>
            <button onclick="window.location.reload()"
                    class="inline-flex items-center gap-2 bg-saffron-500 hover:bg-saffron-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Try Again
            </button>
        </div>
        @endif

        {{-- Back link --}}
        <div class="mt-8 flex items-center justify-between text-sm text-gray-400">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 hover:text-saffron-500 transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
            <div class="flex gap-5">
                @foreach([
                    'terms-conditions' => 'Terms',
                    'privacy-policy'   => 'Privacy',
                    'about'            => 'About',
                    'contact-support'  => 'Contact',
                ] as $slug => $label)
                @if($slug !== $page)
                <a href="{{ route('content.page', $slug) }}"
                   class="hover:text-saffron-500 transition-colors">{{ $label }}</a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ── Minimal footer ───────────────────────────────────────── --}}
<footer class="bg-gray-950 text-white py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
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

{{-- ── Typography styles for API-rendered HTML ─────────────── --}}
<style>
.rich-content { color: #374151; line-height: 1.75; font-size: 0.9375rem; }
.rich-content h1 { font-size: 1.75rem;  font-weight: 700; color: #111827; margin: 2rem 0 0.875rem; line-height: 1.25; }
.rich-content h2 { font-size: 1.375rem; font-weight: 700; color: #111827; margin: 1.75rem 0 0.75rem; line-height: 1.3; }
.rich-content h3 { font-size: 1.15rem;  font-weight: 600; color: #111827; margin: 1.5rem 0 0.625rem; }
.rich-content h4 { font-size: 1rem;     font-weight: 600; color: #374151; margin: 1.25rem 0 0.5rem; }
.rich-content p  { margin-bottom: 1rem; }
.rich-content p:last-child { margin-bottom: 0; }
.rich-content ul { list-style: disc;    padding-left: 1.625rem; margin: 0.75rem 0 1rem; }
.rich-content ol { list-style: decimal; padding-left: 1.625rem; margin: 0.75rem 0 1rem; }
.rich-content li { margin-bottom: 0.375rem; }
.rich-content li::marker { color: #ff6b35; }
.rich-content a  { color: #ff6b35; text-decoration: underline; text-underline-offset: 3px; }
.rich-content a:hover { color: #e84f1a; }
.rich-content strong { font-weight: 600; color: #111827; }
.rich-content em { font-style: italic; color: #6b7280; }
.rich-content blockquote {
    border-left: 3px solid #ff6b35;
    margin: 1.25rem 0;
    padding: 0.875rem 1.25rem;
    background: #fff8f3;
    border-radius: 0 0.75rem 0.75rem 0;
    color: #6b7280;
    font-style: italic;
}
.rich-content hr { border: none; border-top: 1px solid #f3f4f6; margin: 2rem 0; }
.rich-content table { width: 100%; border-collapse: collapse; margin: 1.25rem 0; font-size: 0.875rem; }
.rich-content th { background: #f9fafb; padding: 0.75rem 1rem; text-align: left; font-weight: 600; color: #111827; border: 1px solid #e5e7eb; }
.rich-content td { padding: 0.75rem 1rem; border: 1px solid #e5e7eb; }
.rich-content tr:nth-child(even) td { background: #fafafa; }
.rich-content code {
    background: #f3f4f6;
    color: #c41e3a;
    padding: 0.125rem 0.4rem;
    border-radius: 0.3rem;
    font-family: ui-monospace, monospace;
    font-size: 0.85em;
}
.rich-content pre {
    background: #1f2937;
    color: #e5e7eb;
    padding: 1.25rem;
    border-radius: 0.75rem;
    overflow-x: auto;
    margin: 1.25rem 0;
    font-size: 0.85rem;
}
.rich-content pre code { background: none; color: inherit; padding: 0; }
.rich-content img { max-width: 100%; border-radius: 0.75rem; margin: 1rem 0; }
</style>

@endsection
