@extends('layouts.landing')

@section('title', 'Delete Your Account – Event Bondhu')
@section('meta_description', 'Request deletion of your Event Bondhu account and all associated personal data. Submit a request via the app or this form.')
@section('canonical', route('account-deletion.show'))

@section('content')

{{-- ── Sticky nav ──────────────────────────────────────── --}}
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto">
        </a>
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-saffron-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Home
        </a>
    </div>
</nav>

{{-- ── Hero ────────────────────────────────────────────── --}}
<div class="relative overflow-hidden py-14 sm:py-20"
     style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 30%,#c41e3a 65%,#e84f1a 100%)">
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-56 h-56 rounded-full border border-white/8 animate-spin-slow-rev"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6">
        <nav class="flex items-center gap-2 text-white/50 text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white/80">Delete Account</span>
        </nav>
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center text-3xl shrink-0 mt-1">🗑️</div>
            <div>
                <h1 class="font-display text-3xl sm:text-4xl font-bold text-white">Delete Your Account</h1>
                <p class="text-white/65 mt-2 text-base max-w-xl leading-relaxed">
                    You can request the deletion of your Event Bondhu account and all associated personal data
                    using the steps below or the form on this page.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- ── Content area ─────────────────────────────────────── --}}
<div class="bg-gray-50 min-h-screen py-10 sm:py-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-6">

        {{-- ── In-app steps ────────────────────────────── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 sm:p-10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-xl bg-saffron-50 border border-saffron-200 flex items-center justify-center text-lg">📱</div>
                <h2 class="font-bold text-gray-900 text-lg">Delete directly from the app</h2>
            </div>
            <ol class="space-y-4">
                @foreach([
                    ['Open the', 'Event Bondhu', 'app and log in to your account.'],
                    ['Go to', 'Profile → Settings → Account', '.'],
                    ['Tap', '"Delete Account"', 'and confirm with your password.'],
                    ['Your account and data will be', 'immediately and permanently deleted', '.'],
                ] as $i => [$pre, $bold, $post])
                <li class="flex items-start gap-4">
                    <span class="w-7 h-7 rounded-full bg-gradient-to-br from-saffron-500 to-crimson-500 text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $i + 1 }}</span>
                    <p class="text-gray-600 text-sm leading-relaxed pt-0.5">
                        {{ $pre }} <strong class="text-gray-900 font-semibold">{{ $bold }}</strong>{{ $post }}
                    </p>
                </li>
                @endforeach
            </ol>
        </div>

        {{-- ── Data retention table ─────────────────────── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 sm:p-10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-xl bg-crimson-50 border border-crimson-100 flex items-center justify-center text-lg">🔒</div>
                <h2 class="font-bold text-gray-900 text-lg">What data is deleted vs. retained</h2>
            </div>
            <div class="overflow-x-auto -mx-1">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-2.5 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Data type</th>
                            <th class="text-left py-2.5 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Action</th>
                            <th class="text-left py-2.5 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Retention</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach([
                            ['Account & profile info (name, email, phone, photos)',   'deleted', 'Immediately on request'],
                            ['Matrimonial profile & partner preferences',              'deleted', 'Immediately on request'],
                            ['Messages & interests sent / received',                   'deleted', 'Immediately on request'],
                            ['Vendor inquiry history',                                 'deleted', 'Immediately on request'],
                            ['Audit & transaction logs (legal compliance)',            'kept',    'Up to 3 years (legal obligation)'],
                            ['Anonymised analytics data',                              'kept',    'No personal identifiers kept'],
                        ] as [$data, $action, $retention])
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="py-3 px-3 text-gray-700">{{ $data }}</td>
                            <td class="py-3 px-3">
                                @if($action === 'deleted')
                                <span class="inline-flex items-center gap-1 bg-red-50 text-red-600 text-xs font-semibold px-2.5 py-1 rounded-full border border-red-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Deleted
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full border border-green-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                    Retained
                                </span>
                                @endif
                            </td>
                            <td class="py-3 px-3 text-gray-500 text-xs">{{ $retention }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── Web request form ─────────────────────────── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 sm:p-10">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-9 h-9 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-center text-lg">📝</div>
                <h2 class="font-bold text-gray-900 text-lg">Request deletion via this form</h2>
            </div>
            <p class="text-gray-500 text-sm leading-relaxed mb-7 ml-12">
                If you no longer have access to the app, fill in the form below. We will process your
                request within <strong class="text-gray-700">30 days</strong> and send a confirmation to your email address.
            </p>

            @if(session('success'))
            <div class="flex flex-col items-center text-center bg-green-50 border border-green-100 rounded-2xl p-8">
                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center text-3xl mb-4">✅</div>
                <h3 class="font-bold text-green-900 text-lg mb-2">Request Received</h3>
                <p class="text-green-800 text-sm leading-relaxed max-w-sm">
                    We have received your account deletion request. Our team will process it within
                    <strong>30 days</strong> and send a confirmation email once completed.
                </p>
            </div>

            @else
            <form method="POST" action="{{ route('account-deletion.submit') }}" novalidate class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Email address linked to your account <span class="text-crimson-500">*</span>
                    </label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="you@example.com"
                           class="w-full px-4 py-3 rounded-xl border text-sm text-gray-900 placeholder-gray-400 outline-none transition-all
                                  {{ $errors->has('email') ? 'border-red-400 bg-red-50 focus:ring-2 focus:ring-red-200' : 'border-gray-200 bg-gray-50 focus:border-saffron-400 focus:bg-white focus:ring-2 focus:ring-saffron-100' }}"
                           required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="reason" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Reason for deletion <span class="text-gray-400 font-normal">(optional)</span>
                    </label>
                    <textarea id="reason" name="reason" rows="4"
                              placeholder="Let us know why you're leaving…"
                              class="w-full px-4 py-3 rounded-xl border text-sm text-gray-900 placeholder-gray-400 outline-none transition-all resize-none
                                     {{ $errors->has('reason') ? 'border-red-400 bg-red-50 focus:ring-2 focus:ring-red-200' : 'border-gray-200 bg-gray-50 focus:border-saffron-400 focus:bg-white focus:ring-2 focus:ring-saffron-100' }}">{{ old('reason') }}</textarea>
                    @error('reason')
                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Warning notice --}}
                <div class="flex items-start gap-3 bg-red-50 border border-red-100 rounded-xl p-4 text-sm text-red-700">
                    <svg class="w-5 h-5 shrink-0 mt-0.5 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <p><strong class="font-semibold">This action is irreversible.</strong> Once processed, your account, profile, messages, and all personal data will be permanently deleted and cannot be recovered.</p>
                </div>

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 active:bg-red-800 text-white font-semibold text-sm py-3.5 rounded-xl transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Submit Deletion Request
                </button>
            </form>

            <p class="text-gray-400 text-xs leading-relaxed mt-5">
                By submitting this form you confirm you are the account owner. For questions, contact us at
                <a href="mailto:eventbondhuindia@gmail.com" class="text-saffron-600 hover:text-saffron-700 underline underline-offset-2">eventbondhuindia@gmail.com</a>.
            </p>
            @endif
        </div>

        {{-- Back link --}}
        <div class="flex items-center justify-between text-sm text-gray-400 pt-2 pb-4">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 hover:text-saffron-500 transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
            <div class="flex gap-5">
                <a href="{{ route('content.page', 'privacy-policy') }}"   class="hover:text-saffron-500 transition-colors">Privacy Policy</a>
                <a href="{{ route('content.page', 'terms-conditions') }}" class="hover:text-saffron-500 transition-colors">Terms</a>
                <a href="{{ route('content.page', 'contact-support') }}"  class="hover:text-saffron-500 transition-colors">Contact</a>
            </div>
        </div>

    </div>
</div>

{{-- ── Footer ───────────────────────────────────────────── --}}
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

@endsection
