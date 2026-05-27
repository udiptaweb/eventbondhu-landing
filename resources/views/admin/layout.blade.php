<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Event Bondhu Admin</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="h-full bg-gray-50 font-sans antialiased">

<div class="flex h-full">

    {{-- ── Sidebar ─────────────────────────────── --}}
    <aside id="sidebar"
           class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 bg-gray-900
                  -translate-x-full lg:translate-x-0 transition-transform duration-300">

        {{-- Logo --}}
        <div class="flex items-center gap-3 h-16 px-5 border-b border-white/10 shrink-0">
            <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-9 w-auto shrink-0">
            <div class="min-w-0">
                <div class="text-white font-semibold text-sm truncate">Event Bondhu</div>
                <div class="text-gray-400 text-xs">Admin Panel</div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                      {{ request()->routeIs('admin.dashboard')
                            ? 'bg-saffron-500/15 text-saffron-400 border border-saffron-500/20'
                            : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
            </a>
        </nav>

        {{-- Admin info + logout --}}
        <div class="px-3 py-4 border-t border-white/10 shrink-0">
            <div class="flex items-center gap-3 px-3 py-2 mb-1">
                <div class="w-8 h-8 rounded-full bg-saffron-500/20 flex items-center justify-center
                            text-saffron-400 text-xs font-bold uppercase shrink-0">
                    {{ substr(auth('admin')->user()->name, 0, 2) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-medium truncate">{{ auth('admin')->user()->name }}</p>
                    <p class="text-gray-400 text-xs truncate">{{ auth('admin')->user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-gray-400
                               hover:text-white hover:bg-white/5 transition-colors">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Mobile sidebar overlay --}}
    <div id="sidebar-overlay"
         class="fixed inset-0 bg-black/60 z-40 lg:hidden hidden"
         onclick="toggleSidebar()"></div>

    {{-- ── Main content ─────────────────────────── --}}
    <div class="flex-1 flex flex-col min-h-screen lg:ml-64">

        {{-- Mobile top bar --}}
        <header class="lg:hidden sticky top-0 z-30 bg-white border-b border-gray-200
                        flex items-center gap-3 px-4 h-14 shrink-0">
            <button onclick="toggleSidebar()"
                    class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="font-semibold text-gray-900 text-sm">Event Bondhu Admin</span>
        </header>

        {{-- Page content --}}
        <main class="flex-1 p-5 sm:p-8">
            @yield('content')
        </main>
    </div>
</div>

<script>
function toggleSidebar() {
    const s = document.getElementById('sidebar');
    const o = document.getElementById('sidebar-overlay');
    const hidden = s.classList.contains('-translate-x-full');
    s.classList.toggle('-translate-x-full', !hidden);
    o.classList.toggle('hidden', !hidden);
}
</script>

@stack('scripts')
</body>
</html>
