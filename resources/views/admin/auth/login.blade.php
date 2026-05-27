<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Event Bondhu</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen font-sans flex items-center justify-center px-4 py-12"
      style="background:linear-gradient(135deg,#fff8f3 0%,#ffe8d4 40%,#ffd4a8 100%)">

    {{-- Decorative circles --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-saffron-200/40 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-crimson-200/30 blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-2xl shadow-saffron-100 overflow-hidden">

            {{-- Card top stripe --}}
            <div class="h-2 w-full" style="background:linear-gradient(90deg,#ff6b35,#c41e3a,#f5a623)"></div>

            <div class="px-8 pt-8 pb-10">

                {{-- Logo --}}
                <div class="flex flex-col items-center mb-8">
                    <img src="{{ asset('logo.png') }}" alt="Event Bondhu" class="h-16 w-auto mb-4 drop-shadow-lg">
                    <h1 class="text-gray-900 font-bold text-2xl">Admin Login</h1>
                    <p class="text-gray-400 text-sm mt-1">Event Bondhu Admin Panel</p>
                </div>

                {{-- Session flash --}}
                @if(session('error'))
                <div class="mb-5 flex items-start gap-3 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-red-700 text-sm">{{ session('error') }}</p>
                </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="eventbondhuindia@gmail.com"
                                   class="w-full pl-10 pr-4 py-3 border rounded-xl text-sm transition-colors
                                          focus:outline-none focus:ring-2 focus:ring-saffron-400 focus:border-transparent
                                          {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50 hover:border-gray-300' }}">
                        </div>
                        @error('email')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                   placeholder="••••••••"
                                   class="w-full pl-10 pr-10 py-3 border rounded-xl text-sm transition-colors
                                          focus:outline-none focus:ring-2 focus:ring-saffron-400 focus:border-transparent
                                          {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50 hover:border-gray-300' }}">
                            <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600">
                                <svg id="eye-icon" class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="remember" id="remember"
                               class="w-4 h-4 rounded border-gray-300 text-saffron-500 focus:ring-saffron-400 cursor-pointer">
                        <label for="remember" class="text-sm text-gray-600 cursor-pointer">Keep me signed in</label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full py-3.5 rounded-xl text-white font-semibold text-sm
                                   shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200
                                   active:scale-[0.98]"
                            style="background:linear-gradient(135deg,#ff6b35,#c41e3a)">
                        Sign In to Dashboard
                    </button>
                </form>

                {{-- Back link --}}
                <p class="mt-6 text-center text-xs text-gray-400">
                    <a href="{{ route('home') }}" class="hover:text-saffron-500 transition-colors">
                        ← Back to Event Bondhu website
                    </a>
                </p>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Event Bondhu · All rights reserved
        </p>
    </div>

    <script>
    function togglePassword() {
        const inp = document.getElementById('password');
        inp.type = inp.type === 'password' ? 'text' : 'password';
    }
    </script>
</body>
</html>
