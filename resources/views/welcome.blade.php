@extends('layouts.landing')

@section('content')

{{-- ═══════════════════════════════════════════════════════
     NAVIGATION
════════════════════════════════════════════════════════ --}}
<nav id="main-nav" class="fixed inset-x-0 top-0 z-50 py-4 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        {{-- Logo --}}
        <a href="#home" class="flex items-center gap-2.5">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto">
        </a>

        {{-- Desktop links --}}
        <div class="hidden md:flex items-center gap-7">
            <a href="#how-it-works" class="nav-link text-white/85 hover:text-white text-sm font-medium transition-colors duration-200">How it Works</a>
            <a href="#categories"   class="nav-link text-white/85 hover:text-white text-sm font-medium transition-colors duration-200">Services</a>
            <a href="#features"     class="nav-link text-white/85 hover:text-white text-sm font-medium transition-colors duration-200">Features</a>
            <a href="#testimonials" class="nav-link text-white/85 hover:text-white text-sm font-medium transition-colors duration-200">Reviews</a>
            <a href="#download"
               class="btn-shimmer text-white text-sm font-semibold px-5 py-2.5 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105"
               data-track="android">
                ↓ Download App
            </a>
        </div>

        {{-- Mobile hamburger --}}
        <button id="menu-toggle" class="md:hidden text-white p-2 rounded-lg" aria-label="Open menu" aria-expanded="false">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden md:hidden mt-3 mx-0 rounded-2xl overflow-hidden shadow-2xl"
         style="background:rgba(30,10,20,0.95);backdrop-filter:blur(16px)">
        <div class="flex flex-col py-4 px-5 gap-1">
            <a href="#how-it-works" class="text-white/85 hover:text-white py-2.5 text-sm font-medium border-b border-white/10">How it Works</a>
            <a href="#categories"   class="text-white/85 hover:text-white py-2.5 text-sm font-medium border-b border-white/10">Services</a>
            <a href="#features"     class="text-white/85 hover:text-white py-2.5 text-sm font-medium border-b border-white/10">Features</a>
            <a href="#testimonials" class="text-white/85 hover:text-white py-2.5 text-sm font-medium border-b border-white/10">Reviews</a>
            <a href="#download" class="mt-2 text-center btn-shimmer text-white text-sm font-semibold px-5 py-3 rounded-full" data-track="android">
                ↓ Download Free on Android
            </a>
        </div>
    </div>
</nav>


{{-- ═══════════════════════════════════════════════════════
     HERO
════════════════════════════════════════════════════════ --}}
<section id="home" class="relative min-h-screen flex items-center overflow-hidden"
    style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 25%,#c41e3a 55%,#e84f1a 78%,#f5a623 100%)">

    {{-- Decorative rings --}}
    <div id="hero-decor" class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-32 -right-32 w-[600px] h-[600px] rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -top-16 -right-16 w-[450px] h-[450px] rounded-full border border-white/8 animate-spin-slow-rev"></div>
        <div class="absolute -bottom-24 -left-24 w-[500px] h-[500px] rounded-full border border-white/8 animate-spin-slow"></div>
        <div class="absolute top-0 left-0 w-96 h-96 rounded-full bg-crimson-500/20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-saffron-500/25 blur-3xl"></div>
        <div class="absolute top-24 left-12  w-5 h-5 rounded-full bg-gold-400/50 animate-float"></div>
        <div class="absolute top-48 left-1/4 w-3 h-3 rounded-full bg-white/30 animate-float2"></div>
        <div class="absolute bottom-32 right-1/4 w-4 h-4 rounded-full bg-gold-300/40 animate-float"></div>
        <div class="absolute top-1/3 right-12  w-6 h-6 rounded-full bg-saffron-300/30 animate-float2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-20 w-full">
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- ── Left: Text ── --}}
            <div class="text-white space-y-6 animate-slide-left">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-2 text-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-gold-400 opacity-75 animate-ping"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-gold-400"></span>
                    </span>
                    Now Available on Google Play
                </div>

                {{-- Headline --}}
                <h1 class="font-display text-5xl sm:text-6xl font-bold leading-[1.1]">
                    Your Perfect<br>
                    Event <span class="gradient-text-gold">Artisan</span><br>
                    is Just a Tap Away
                </h1>

                <p class="text-white/75 text-lg leading-relaxed max-w-lg">
                    Connect with verified <strong class="text-white">photographers, makeup artists,
                    caterers, mandap designers, priests</strong> and 15+ more artisan types
                    for your special Indian celebrations. Book in minutes, celebrate forever.
                </p>

                {{-- CTA buttons --}}
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="https://play.google.com/store/apps/details?id=com.eventbondhuap.app"
                       target="_blank" rel="noopener"
                       class="btn-download group flex items-center gap-3 bg-white text-gray-900 px-6 py-3.5 rounded-2xl font-semibold shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300"
                       data-track="android">
                        <svg class="w-7 h-7 shrink-0" viewBox="0 0 24 24">
                            <path fill="#00c853" d="M3.18 23.76c.33.18.7.18 1.06-.01l12.45-7.19-2.89-2.89z"/>
                            <path fill="#ea4335" d="M20.5 12.5c0-.66-.37-1.24-.91-1.56l-2.97-1.71-3.17 3.17 3.17 3.17 2.98-1.72c.54-.32.9-.9.9-1.35z"/>
                            <path fill="#4285f4" d="M.5 1.37C.19 1.7 0 2.21 0 2.88v18.24c0 .67.19 1.18.5 1.51l.08.08 10.22-10.22V12L.59 1.29z"/>
                            <path fill="#fbbc04" d="M16.69 7.44l-3.37-1.94L10.22 8.6l3.13 3.13 3.34-1.94c.96-.54.96-1.8 0-2.35z"/>
                        </svg>
                        <div class="text-left">
                            <div class="text-[10px] text-gray-500 uppercase tracking-wider">GET IT ON</div>
                            <div class="text-base font-bold leading-tight">Google Play</div>
                        </div>
                    </a>

                    <a href="#download"
                       class="group flex items-center gap-3 glass border border-white/30 text-white px-6 py-3.5 rounded-2xl font-semibold hover:bg-white/20 transition-all duration-300">
                        <svg class="w-7 h-7 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.37 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg>
                        <div class="text-left">
                            <div class="text-[10px] text-white/60 uppercase tracking-wider">COMING SOON</div>
                            <div class="text-base font-bold leading-tight">App Store</div>
                        </div>
                    </a>
                </div>

                {{-- Trust row --}}
                <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-white/65 pt-1">
                    <span class="flex items-center gap-1.5">
                        <span class="text-gold-400 text-base">★★★★★</span> 4.8 Rating
                    </span>
                    <span class="hidden sm:block w-px h-4 bg-white/25"></span>
                    <span>500+ Verified Artisans</span>
                    <span class="hidden sm:block w-px h-4 bg-white/25"></span>
                    <span>100% Free to Use</span>
                </div>
            </div>

            {{-- ── Right: Phone Mockup ── --}}
            <div class="relative flex justify-center items-center animate-slide-right">
                <div class="absolute w-72 h-72 rounded-full blur-3xl bg-saffron-500/30 animate-float"></div>

                {{-- Floating: Photographer booked --}}
                <div class="absolute -left-4 sm:-left-12 top-1/4 glass rounded-2xl p-3 shadow-xl animate-float z-10 max-w-[160px]">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-lg shrink-0"
                             style="background:linear-gradient(135deg,#ff6b35,#e84f1a)">📸</div>
                        <div>
                            <div class="text-white text-[11px] font-semibold">Photographer</div>
                            <div class="text-white/60 text-[10px]">Just booked! ✓</div>
                        </div>
                    </div>
                </div>

                {{-- Floating: Rating --}}
                <div class="absolute -right-2 sm:-right-10 top-[38%] glass rounded-2xl p-3 shadow-xl animate-float2 z-10">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full bg-gold-500 flex items-center justify-center text-lg shrink-0">⭐</div>
                        <div>
                            <div class="text-white text-[11px] font-semibold">4.9 / 5</div>
                            <div class="text-white/60 text-[10px]">1200+ reviews</div>
                        </div>
                    </div>
                </div>

                {{-- Floating: Catering --}}
                <div class="absolute -left-2 sm:-left-8 bottom-1/4 glass rounded-2xl p-3 shadow-xl animate-float z-10" style="animation-delay:1.5s">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full bg-crimson-500 flex items-center justify-center text-lg shrink-0">🍽️</div>
                        <div>
                            <div class="text-white text-[11px] font-semibold">Catering</div>
                            <div class="text-white/60 text-[10px]">500+ guests ✓</div>
                        </div>
                    </div>
                </div>

                {{-- Phone Frame --}}
                <div class="phone-frame relative z-0">
                    <div class="phone-notch"></div>
                    <div class="phone-btn-power"></div>
                    <div class="phone-btn-vol" style="top:28%;height:18px"></div>
                    <div class="phone-btn-vol" style="top:38%;height:28px"></div>

                    <div class="h-full flex flex-col pt-7"
                         style="background:linear-gradient(180deg,#fff3ec 0%,#ffffff 60%)">
                        {{-- App bar --}}
                        <div class="px-4 pt-2 pb-3" style="background:linear-gradient(135deg,#ff6b35,#c41e3a)">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-white text-[11px] font-bold">Event Bondhu</span>
                                <span class="text-white/70 text-[9px]">📍 Guwahati</span>
                            </div>
                            <div class="bg-white/95 rounded-full px-3 py-1.5 flex items-center gap-1.5">
                                <span class="text-gray-400 text-[10px]">🔍</span>
                                <span class="text-gray-400 text-[9px]">Search photographer, caterer...</span>
                            </div>
                        </div>

                        {{-- Category chips --}}
                        <div class="px-3 pt-3 pb-1">
                            <p class="text-gray-600 text-[9px] font-semibold uppercase tracking-wide mb-2">Services</p>
                            <div class="flex gap-1.5 overflow-hidden">
                                @foreach([['📸','Photo','bg-orange-100'],['💄','Makeup','bg-pink-100'],['🍽️','Cater','bg-red-100'],['🏛️','Mandap','bg-purple-100']] as [$icon,$lbl,$bg])
                                <div class="shrink-0 flex flex-col items-center gap-0.5">
                                    <div class="w-9 h-9 rounded-xl {{ $bg }} flex items-center justify-center text-sm">{{ $icon }}</div>
                                    <span class="text-[8px] text-gray-500">{{ $lbl }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Artisan cards --}}
                        <div class="px-3 pt-2 space-y-2 overflow-hidden">
                            <p class="text-gray-600 text-[9px] font-semibold uppercase tracking-wide">Top Rated</p>
                            @foreach([
                                ['RS','Rajesh Studios',  'Photographer',   '4.9','5K+','from-saffron-400 to-saffron-600'],
                                ['SM','Sunita Makeovers','Makeup Artist',   '4.8','3K+','from-crimson-400 to-crimson-600'],
                                ['AA','Ananya Arts',     'Mandap Designer', '4.7','8K+','from-purple-400 to-purple-600'],
                            ] as [$init,$name,$cat,$rat,$price,$grad])
                            <div class="bg-white rounded-xl p-2 shadow-sm flex items-center gap-2 border border-gray-100">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $grad }} flex items-center justify-center text-white text-[10px] font-bold shrink-0">
                                    {{ $init }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-gray-800 text-[9px] font-semibold truncate">{{ $name }}</p>
                                    <p class="text-gray-500 text-[8px]">{{ $cat }} · ⭐{{ $rat }}</p>
                                </div>
                                <span class="text-saffron-600 text-[8px] font-bold shrink-0">₹{{ $price }}</span>
                            </div>
                            @endforeach
                        </div>

                        {{-- Bottom nav --}}
                        <div class="mt-auto border-t border-gray-100 flex justify-around py-2 bg-white">
                            @foreach(['🏠','🔍','❤️','👤'] as $ic)
                            <span class="text-base opacity-60">{{ $ic }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 inset-x-0">
        <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-16 sm:h-20">
            <path fill="#ffffff" d="M0,40 C240,70 480,10 720,40 C960,70 1200,10 1440,40 L1440,70 L0,70 Z"/>
        </svg>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     STATS BAR
════════════════════════════════════════════════════════ --}}
<section class="bg-white py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @foreach([
                ['500','+'  ,'Verified Artisans','text-saffron-500'],
                ['20' ,'+'  ,'Service Types',    'text-crimson-500'],
                ['50' ,'+'  ,'Cities Covered',   'text-saffron-600'],
                ['4'  ,'.8★','Avg. Rating',       'text-gold-600'  ],
            ] as [$num,$suf,$lbl,$col])
            <div class="stat-card reveal" data-delay="{{ $loop->index * 100 }}">
                <div class="text-4xl sm:text-5xl font-black {{ $col }} mb-1">
                    <span data-counter="{{ $num }}" data-suffix="{{ $suf }}">0{{ $suf }}</span>
                </div>
                <div class="text-gray-500 text-sm font-medium">{{ $lbl }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     HOW IT WORKS
════════════════════════════════════════════════════════ --}}
<section id="how-it-works" class="py-24 relative overflow-hidden"
    style="background:linear-gradient(180deg,#fff8f3 0%,#fff3e8 100%)">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="reveal inline-block text-saffron-500 font-semibold text-sm uppercase tracking-widest mb-3">Simple Process</span>
            <h2 class="reveal font-display text-4xl sm:text-5xl font-bold text-gray-900 leading-tight" data-delay="100">
                How <span class="gradient-text">Event Bondhu</span> Works
            </h2>
            <p class="reveal text-gray-500 mt-4 max-w-xl mx-auto" data-delay="200">
                From discovery to celebration — book your perfect artisan in just a few taps.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 relative">
            {{-- Connector line desktop --}}
            <div class="hidden lg:block absolute top-14 left-[12.5%] right-[12.5%] h-0.5 bg-gradient-to-r from-saffron-200 via-crimson-200 to-gold-300 z-0"></div>

            @foreach([
                ['01','🔍','Browse Artisans',   'Search by category, city, date and budget to find the perfect artisan for your event.',  'from-saffron-500 to-saffron-600'],
                ['02','👀','Explore Profiles',   'View detailed portfolios, verified reviews, pricing packages, and real-time availability.','from-crimson-500 to-crimson-600'],
                ['03','📅','Book Instantly',     'Choose your date, confirm the booking, and receive an instant confirmation.',             'from-purple-500 to-purple-700'],
                ['04','🎉','Celebrate!',         'Enjoy a flawlessly managed event with your trusted artisan by your side.',              'from-gold-500 to-gold-600'],
            ] as [$num,$icon,$title,$desc,$grad])
            <div class="reveal text-center relative z-10" data-delay="{{ $loop->index * 150 }}">
                <div class="inline-flex flex-col items-center gap-4">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-gradient-to-br {{ $grad }} flex items-center justify-center text-4xl shadow-xl">
                            {{ $icon }}
                        </div>
                        <div class="absolute -top-1 -right-1 w-7 h-7 rounded-full bg-white border-2 border-saffron-200 flex items-center justify-center text-[10px] font-black text-saffron-600 shadow">
                            {{ $num }}
                        </div>
                    </div>
                    <h3 class="text-gray-900 font-bold text-lg">{{ $title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     SERVICE CATEGORIES
════════════════════════════════════════════════════════ --}}
<section id="categories" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @php
            $palette = [
                ['bg' => 'bg-orange-50  border-orange-200', 'text' => 'text-orange-600',  'avatar' => 'from-orange-400 to-orange-600'],
                ['bg' => 'bg-red-50     border-red-200',    'text' => 'text-red-600',      'avatar' => 'from-red-400    to-red-600'],
                ['bg' => 'bg-pink-50    border-pink-200',   'text' => 'text-pink-600',     'avatar' => 'from-pink-400   to-pink-600'],
                ['bg' => 'bg-purple-50  border-purple-200', 'text' => 'text-purple-600',   'avatar' => 'from-purple-400 to-purple-600'],
                ['bg' => 'bg-amber-50   border-amber-200',  'text' => 'text-amber-700',    'avatar' => 'from-amber-400  to-amber-600'],
                ['bg' => 'bg-green-50   border-green-200',  'text' => 'text-green-700',    'avatar' => 'from-green-400  to-green-600'],
                ['bg' => 'bg-blue-50    border-blue-200',   'text' => 'text-blue-700',     'avatar' => 'from-blue-400   to-blue-600'],
                ['bg' => 'bg-indigo-50  border-indigo-200', 'text' => 'text-indigo-700',   'avatar' => 'from-indigo-400 to-indigo-600'],
                ['bg' => 'bg-teal-50    border-teal-200',   'text' => 'text-teal-700',     'avatar' => 'from-teal-400   to-teal-600'],
                ['bg' => 'bg-cyan-50    border-cyan-200',   'text' => 'text-cyan-700',     'avatar' => 'from-cyan-400   to-cyan-600'],
                ['bg' => 'bg-rose-50    border-rose-200',   'text' => 'text-rose-600',     'avatar' => 'from-rose-400   to-rose-600'],
                ['bg' => 'bg-yellow-50  border-yellow-200', 'text' => 'text-yellow-700',   'avatar' => 'from-yellow-400 to-yellow-600'],
            ];
            $catCount = count($categories);
        @endphp

        <div class="text-center mb-14">
            <span class="reveal inline-block text-crimson-500 font-semibold text-sm uppercase tracking-widest mb-3">All Services</span>
            <h2 class="reveal font-display text-4xl sm:text-5xl font-bold text-gray-900" data-delay="100">
                Every Artisan You Need,<br>
                <span class="gradient-text">All in One Place</span>
            </h2>
            <p class="reveal text-gray-500 mt-4 max-w-xl mx-auto" data-delay="200">
                Browse {{ $catCount > 0 ? $catCount.'+' : '20+' }} categories of verified event professionals for Indian weddings and ceremonies.
            </p>
        </div>

        @if(!empty($categories))
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($categories as $cat)
            @php
                $p       = $palette[$loop->index % count($palette)];
                $name    = $cat['label'] ?? $cat['name'] ?? 'Service';
                $icon    = $cat['icon'] ?? null;
                $initial = mb_strtoupper(mb_substr($name, 0, 1));
            @endphp
            <a href="{{ isset($cat['key']) ? route('service.page', $cat['key']) : '#categories' }}"
               class="category-card reveal rounded-2xl border-2 {{ $p['bg'] }} p-5 block"
               data-delay="{{ ($loop->index % 4) * 80 }}">
                @if($icon)
                <div class="text-4xl mb-3">{{ $icon }}</div>
                @else
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $p['avatar'] }} flex items-center justify-center mb-3">
                    <span class="text-white font-bold text-lg">{{ $initial }}</span>
                </div>
                @endif
                <h3 class="font-bold text-gray-900 text-base mb-1">{{ $name }}</h3>
                <div class="{{ $p['text'] }} text-xs font-semibold mt-3 flex items-center gap-1">
                    Book Now <span>→</span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach([
                ['📸','Photographer',    'bg-orange-50  border-orange-200', 'text-orange-600','Capture every precious moment'],
                ['🎥','Videographer',    'bg-red-50     border-red-200',    'text-red-600',   'Cinematic wedding films'],
                ['💄','Makeup Artist',   'bg-pink-50    border-pink-200',   'text-pink-600',  'Bridal & party makeup'],
                ['💅','Beautician',      'bg-rose-50    border-rose-200',   'text-rose-600',  'Full beauty services'],
                ['🏛️','Mandap Designer', 'bg-purple-50  border-purple-200', 'text-purple-600','Traditional & modern mandaps'],
                ['🍽️','Caterer',         'bg-amber-50   border-amber-200',  'text-amber-700', 'Delicious event catering'],
                ['🙏','Priest / Pandit', 'bg-yellow-50  border-yellow-200', 'text-yellow-700','Vedic ceremonies & rituals'],
                ['💐','Florist',         'bg-green-50   border-green-200',  'text-green-700', 'Beautiful floral decor'],
                ['🎵','DJ & Band',       'bg-blue-50    border-blue-200',   'text-blue-700',  'Music for every occasion'],
                ['🎪','Decorator',       'bg-indigo-50  border-indigo-200', 'text-indigo-700','Theme-based event decor'],
                ['💡','Light & Sound',   'bg-cyan-50    border-cyan-200',   'text-cyan-700',  'Professional AV setup'],
                ['🎭','Entertainer',     'bg-teal-50    border-teal-200',   'text-teal-700',  'Dance, magic & more'],
            ] as [$icon,$name,$bg,$text,$desc])
            <div class="category-card reveal rounded-2xl border-2 {{ $bg }} p-5 cursor-pointer"
                 data-delay="{{ ($loop->index % 4) * 80 }}">
                <div class="text-4xl mb-3">{{ $icon }}</div>
                <h3 class="font-bold text-gray-900 text-base mb-1">{{ $name }}</h3>
                <p class="text-gray-500 text-xs leading-relaxed">{{ $desc }}</p>
                <div class="{{ $text }} text-xs font-semibold mt-3 flex items-center gap-1">
                    Book Now <span>→</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     APP FEATURES
════════════════════════════════════════════════════════ --}}
<section id="features" class="py-24 relative overflow-hidden"
    style="background:linear-gradient(135deg,#2d0a1e 0%,#6e1030 30%,#c41e3a 65%,#e84f1a 100%)">

    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full border border-white/10 animate-spin-slow"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 rounded-full border border-white/10 animate-spin-slow-rev"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-saffron-500/15 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Feature list --}}
            <div class="text-white space-y-8 reveal-left">
                <div>
                    <span class="inline-block text-gold-300 font-semibold text-sm uppercase tracking-widest mb-3">Why Choose Us</span>
                    <h2 class="font-display text-4xl sm:text-5xl font-bold leading-tight">
                        Everything You Need<br>for a <span class="gradient-text-gold">Perfect Event</span>
                    </h2>
                </div>

                <div class="space-y-5">
                    @foreach([
                        ['✅','Verified Artisans',  'Every professional is background-checked and reviewed by real customers.'],
                        ['⚡','Instant Booking',    'Book any artisan in under 2 minutes — no back-and-forth calls.'],
                        ['🔄','Compare Options',    'Side-by-side comparison of prices, portfolios, and availability.'],
                        ['🔒','Secure Payments',    'All transactions are fully encrypted and protected.'],
                        ['⭐','Genuine Reviews',    'Ratings from real, verified customers only — no fake reviews.'],
                        ['📞','24/7 Support',       'Our support team is always here to help you plan your event.'],
                    ] as [$icon,$title,$desc])
                    <div class="feature-item flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-xl shrink-0 mt-0.5">{{ $icon }}</div>
                        <div>
                            <h4 class="font-semibold text-white text-base">{{ $title }}</h4>
                            <p class="text-white/65 text-sm leading-relaxed mt-0.5">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Second phone mockup --}}
            <div class="flex justify-center reveal-right" data-delay="200">
                <div class="relative">
                    <div class="absolute inset-0 bg-saffron-500/20 blur-3xl rounded-full animate-float"></div>

                    <div class="phone-frame relative z-0">
                        <div class="phone-notch"></div>
                        <div class="phone-btn-power"></div>
                        <div class="h-full flex flex-col pt-7 bg-white">

                            {{-- Profile screen --}}
                            <div style="background:linear-gradient(135deg,#ff6b35,#c41e3a)" class="px-4 pt-3 pb-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-white/70 text-[10px]">← Back</span>
                                    <span class="text-white text-[11px] font-bold mx-auto pr-8">Artisan Profile</span>
                                </div>
                                <div class="flex items-end gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center text-2xl border-2 border-white/40">📸</div>
                                    <div class="text-white">
                                        <p class="font-bold text-[12px]">Rajesh Studios</p>
                                        <p class="text-white/75 text-[9px]">Photographer · Guwahati</p>
                                        <div class="flex items-center gap-0.5 mt-1">
                                            @for($i=0;$i<5;$i++)<span class="text-gold-400 text-[10px]">★</span>@endfor
                                            <span class="text-white/70 text-[9px] ml-1">4.9 (128)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tags --}}
                            <div class="px-3 -mt-2 flex flex-wrap gap-1">
                                @foreach(['Wedding','Engagement','Pre-wedding','Portrait'] as $tag)
                                <span class="bg-saffron-50 text-saffron-700 text-[8px] font-medium px-2 py-0.5 rounded-full border border-saffron-200">{{ $tag }}</span>
                                @endforeach
                            </div>

                            {{-- Packages --}}
                            <div class="px-3 pt-3">
                                <p class="text-gray-600 text-[9px] font-semibold uppercase tracking-wide mb-2">Packages</p>
                                @foreach([['Basic','₹5,000','4 hrs · 200 photos'],['Standard','₹10,000','8 hrs · 500 photos'],['Premium','₹18,000','Full day · Album']] as [$pkg,$price,$detail])
                                <div class="flex items-center justify-between py-1.5 border-b border-gray-100 last:border-0">
                                    <div>
                                        <p class="text-gray-800 text-[9px] font-semibold">{{ $pkg }}</p>
                                        <p class="text-gray-400 text-[8px]">{{ $detail }}</p>
                                    </div>
                                    <span class="text-saffron-600 text-[9px] font-bold">{{ $price }}</span>
                                </div>
                                @endforeach
                            </div>

                            {{-- Book button --}}
                            <div class="mt-auto px-3 pb-4">
                                <div class="rounded-xl py-3 text-center text-white text-[11px] font-bold shadow"
                                     style="background:linear-gradient(135deg,#ff6b35,#c41e3a)">
                                    📅 Book This Artisan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════════════════════ --}}
<section id="testimonials" class="py-24"
    style="background:linear-gradient(180deg,#fff8f3 0%,#fff3e8 100%)">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="reveal inline-block text-saffron-500 font-semibold text-sm uppercase tracking-widest mb-3">Happy Customers</span>
            <h2 class="reveal font-display text-4xl sm:text-5xl font-bold text-gray-900" data-delay="100">
                Loved by <span class="gradient-text">Thousands</span>
            </h2>
            <p class="reveal text-gray-500 mt-4 max-w-lg mx-auto" data-delay="200">
                Real stories from real people who made their events unforgettable with Event Bondhu.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['Priya Sharma',  'Bride, Guwahati',       '"Found the most amazing photographer for my wedding through Event Bondhu! The booking was incredibly smooth and the photos were absolutely stunning. Highly recommended!"',          5,'PS','from-saffron-400 to-saffron-600','Wedding Photography'],
                ['Rahul Gupta',   'Groom, Kolkata',        '"Booked catering for 600+ guests in just 10 minutes flat. The caterer was professional, the food was delicious, and everything went perfectly. Event Bondhu is a lifesaver!"',      5,'RG','from-crimson-400 to-crimson-600','Event Catering'],
                ['Anita Patel',   'Mother of Bride, Silchar','"The makeup artist was extraordinary — my daughter looked like a princess! We also booked the mandap designer through the app. Everything exceeded our expectations."', 5,'AP','from-gold-400 to-gold-600',   'Makeup & Mandap'],
            ] as [$name,$role,$quote,$rating,$init,$grad,$service])
            <div class="testimonial-card reveal bg-white rounded-3xl p-8 shadow-md border border-saffron-100" data-delay="{{ $loop->index * 150 }}">
                <div class="flex gap-0.5 mb-4">
                    @for($i=0;$i<$rating;$i++)
                    <svg class="w-5 h-5 text-gold-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <blockquote class="text-gray-700 text-sm leading-relaxed mb-6">{{ $quote }}</blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br {{ $grad }} flex items-center justify-center text-white text-sm font-bold shrink-0">{{ $init }}</div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm">{{ $name }}</p>
                        <p class="text-gray-400 text-xs">{{ $role }}</p>
                    </div>
                    <span class="ml-auto text-[10px] font-medium px-2.5 py-1 rounded-full bg-saffron-50 text-saffron-600 border border-saffron-100 whitespace-nowrap">{{ $service }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     ARTISAN JOIN BANNER
════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal rounded-3xl overflow-hidden shadow-xl"
             style="background:linear-gradient(135deg,#fff8f3,#ffe8d4)">
            <div class="grid md:grid-cols-2 gap-8 items-center p-10">
                <div>
                    <span class="text-saffron-500 font-semibold text-sm uppercase tracking-widest">Are You an Artisan?</span>
                    <h3 class="font-display text-3xl font-bold text-gray-900 mt-2 mb-3 leading-tight">
                        Grow Your Business<br>with <span class="gradient-text">Event Bondhu</span>
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Join 500+ verified artisans already growing their event business on our platform.
                        List your services, showcase your portfolio, and get more bookings.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 md:justify-end items-center">
                    <div class="text-center">
                        <div class="text-3xl font-black text-saffron-500">Free</div>
                        <div class="text-gray-500 text-xs">to list your services</div>
                    </div>
                    <a href="#download"
                       class="bg-gradient-to-r from-saffron-500 to-crimson-500 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-sm text-center whitespace-nowrap">
                        Join as Artisan →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     DOWNLOAD CTA
════════════════════════════════════════════════════════ --}}
<section id="download" class="py-28 relative overflow-hidden"
    style="background:linear-gradient(135deg,#2d0a1e 0%,#7b1035 30%,#c41e3a 60%,#ff6b35 85%,#f5a623 100%)">

    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] h-[700px] rounded-full bg-white/5 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-crimson-900/30 rounded-full blur-3xl"></div>
        <div class="absolute top-10 right-10 w-5 h-5 rounded-full bg-gold-400/50 animate-float"></div>
        <div class="absolute bottom-20 left-20 w-4 h-4 rounded-full bg-white/30 animate-float2"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <div class="reveal space-y-6">

            <div class="inline-flex items-center gap-2 glass rounded-full px-5 py-2.5 text-sm mb-2">
                <span class="text-gold-400">🎉</span>
                Free Download · No Subscription · No Hidden Fees
            </div>

            <h2 class="font-display text-5xl sm:text-6xl font-bold leading-tight">
                Your Dream Event<br>
                Starts <span class="gradient-text-gold">Right Here</span>
            </h2>

            <p class="text-white/75 text-lg max-w-xl mx-auto leading-relaxed">
                Download Event Bondhu today and discover hundreds of verified artisans
                ready to make your celebrations truly unforgettable.
            </p>

            <div class="flex flex-col sm:flex-row gap-5 justify-center pt-4">
                <a href="https://play.google.com/store/apps/details?id=com.eventbondhuap.app"
                   target="_blank" rel="noopener"
                   class="btn-download group flex items-center gap-4 bg-white text-gray-900 px-8 py-4 rounded-2xl font-semibold shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300 justify-center"
                   data-track="android">
                    <svg class="w-8 h-8 shrink-0" viewBox="0 0 24 24">
                        <path fill="#00c853" d="M3.18 23.76c.33.18.7.18 1.06-.01l12.45-7.19-2.89-2.89z"/>
                        <path fill="#ea4335" d="M20.5 12.5c0-.66-.37-1.24-.91-1.56l-2.97-1.71-3.17 3.17 3.17 3.17 2.98-1.72c.54-.32.9-.9.9-1.35z"/>
                        <path fill="#4285f4" d="M.5 1.37C.19 1.7 0 2.21 0 2.88v18.24c0 .67.19 1.18.5 1.51l.08.08 10.22-10.22V12L.59 1.29z"/>
                        <path fill="#fbbc04" d="M16.69 7.44l-3.37-1.94L10.22 8.6l3.13 3.13 3.34-1.94c.96-.54.96-1.8 0-2.35z"/>
                    </svg>
                    <div class="text-left">
                        <div class="text-xs text-gray-400 uppercase tracking-wider">GET IT ON</div>
                        <div class="text-lg font-black">Google Play</div>
                    </div>
                </a>

                <a href="#"
                   class="group flex items-center gap-4 glass border border-white/30 text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white/15 transition-all duration-300 justify-center">
                    <svg class="w-8 h-8 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.37 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                    </svg>
                    <div class="text-left">
                        <div class="text-xs text-white/50 uppercase tracking-wider">COMING SOON</div>
                        <div class="text-lg font-black">App Store</div>
                    </div>
                </a>
            </div>

            <p class="text-white/40 text-sm pt-2">Scan the QR code at your nearest display · Available in Assam, West Bengal & more</p>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════════════ --}}
<footer class="bg-gray-950 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">

            {{-- Brand --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-10 w-auto brightness-0 invert">
                    <span class="font-display font-bold text-xl">Event Bondhu</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Your trusted partner for booking verified event artisans across India.
                    Making every celebration extraordinary, one booking at a time.
                </p>
                <div class="flex gap-3 pt-1">
                    <a href="#" aria-label="Facebook"
                       class="w-9 h-9 rounded-lg bg-white/10 hover:bg-saffron-500 flex items-center justify-center transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram"
                       class="w-9 h-9 rounded-lg bg-white/10 hover:bg-crimson-500 flex items-center justify-center transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="YouTube"
                       class="w-9 h-9 rounded-lg bg-white/10 hover:bg-red-600 flex items-center justify-center transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-semibold text-base mb-5">Quick Links</h4>
                <ul class="space-y-3">
                    @foreach(['Home' => '#home','How it Works' => '#how-it-works','Services' => '#categories','Features' => '#features','Download App' => '#download'] as $label => $href)
                    <li>
                        <a href="{{ $href }}" class="text-gray-400 hover:text-saffron-400 text-sm transition-colors flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-saffron-500/50 shrink-0"></span>{{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <h4 class="font-semibold text-base mt-6 mb-4">Company</h4>
                <ul class="space-y-3">
                    @foreach(['About the App' => 'about','Contact & Support' => 'contact-support'] as $label => $slug)
                    <li>
                        <a href="{{ route('content.page', $slug) }}" class="text-gray-400 hover:text-saffron-400 text-sm transition-colors flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-saffron-500/50 shrink-0"></span>{{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="font-semibold text-base mb-5">Our Services</h4>
                <ul class="space-y-3">
                    @forelse($categories as $svc)
                    <li>
                        <a href="{{ isset($svc['key']) ? route('service.page', $svc['key']) : '#categories' }}"
                           class="text-gray-400 hover:text-saffron-400 text-sm transition-colors flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-crimson-500/50 shrink-0"></span>{{ $svc['label'] ?? $svc['name'] ?? '' }}
                        </a>
                    </li>
                    @empty
                    @foreach(['Photographer','Videographer','Makeup Artist','Caterer','Mandap Designer','Priest / Pandit','Florist','Decorator'] as $svc)
                    <li>
                        <a href="#categories" class="text-gray-400 hover:text-saffron-400 text-sm transition-colors flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-crimson-500/50 shrink-0"></span>{{ $svc }}
                        </a>
                    </li>
                    @endforeach
                    @endforelse
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="font-semibold text-base mb-5">Get in Touch</h4>
                <ul class="space-y-4 mb-6">
                    <li class="flex items-start gap-3 text-sm text-gray-400">
                        <span class="text-base mt-0.5 shrink-0">📧</span>eventbondhuindia@gmail.com
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-400">
                        <span class="text-base mt-0.5 shrink-0">📞</span>+91 91011 77123
                    </li>
                    <li class="flex items-start gap-3 text-sm text-gray-400">
                        <span class="text-base mt-0.5 shrink-0">📍</span>Guwahati, Assam, India
                    </li>
                </ul>
                <a href="#download"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-saffron-500 to-crimson-500 text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:scale-105 transition-transform shadow-lg"
                   data-track="android">
                    ↓ Download Free
                </a>
            </div>

        </div>

        {{-- Copyright --}}
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
            <p>© {{ date('Y') }} Event Bondhu. All rights reserved. Made with ❤️ in Assam.</p>
            <div class="flex flex-wrap gap-5">
                <a href="{{ route('content.page', 'privacy-policy') }}"   class="hover:text-saffron-400 transition-colors">Privacy Policy</a>
                <a href="{{ route('content.page', 'terms-conditions') }}" class="hover:text-saffron-400 transition-colors">Terms & Conditions</a>
                <a href="{{ route('content.page', 'about') }}"            class="hover:text-saffron-400 transition-colors">About</a>
                <a href="{{ route('content.page', 'contact-support') }}"  class="hover:text-saffron-400 transition-colors">Contact</a>
            </div>
        </div>
    </div>
</footer>

@endsection
