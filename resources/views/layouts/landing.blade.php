<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ── Primary SEO ── --}}
    <title>@yield('title', 'Event Bondhu – Book Trusted Event Artisans for Indian Weddings & Ceremonies')</title>
    <meta name="description"   content="@yield('meta_description', 'Event Bondhu connects you with verified photographers, videographers, makeup artists, caterers, mandap designers, priests and more for Indian weddings, engagements & religious ceremonies. Download free on Android.')">
    <meta name="keywords"      content="@yield('meta_keywords', 'event artisans India, wedding photographer booking, wedding videographer, makeup artist, caterer, mandap decorator, wedding priest pandit, beautician, event booking app, Indian wedding app, Event Bondhu app')">
    <meta name="author"        content="Event Bondhu">
    <meta name="robots"        content="index, follow">
    <link rel="canonical"      href="@yield('canonical', url('/'))">

    {{-- ── Open Graph ── --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="@yield('canonical', url('/'))">
    <meta property="og:title"       content="@yield('title', 'Event Bondhu – Your Trusted Indian Event Service Partner')">
    <meta property="og:description" content="@yield('meta_description', 'Find and book verified photographers, makeup artists, caterers, and more for your special Indian events. Free download on Android.')">
    <meta property="og:image"       content="{{ url('/images/og-image.jpg') }}">
    <meta property="og:site_name"   content="Event Bondhu">
    <meta property="og:locale"      content="en_IN">

    {{-- ── Twitter Card ── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="@yield('title', 'Event Bondhu – Your Trusted Indian Event Service Partner')">
    <meta name="twitter:description" content="@yield('meta_description', 'Find and book verified photographers, makeup artists, caterers, and more for your special Indian events.')">
    <meta name="twitter:image"       content="{{ url('/images/og-image.jpg') }}">

    {{-- ── Theme colors ── --}}
    <meta name="theme-color"                        content="#FF6B35">
    <meta name="msapplication-navbutton-color"      content="#FF6B35">
    <meta name="apple-mobile-web-app-status-bar-style" content="#FF6B35">

    {{-- ── Favicon ── --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    {{-- ── Google Fonts ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    {{-- ── JSON-LD Structured Data ── --}}
    @hasSection('json_ld')
        @yield('json_ld')
    @else
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "MobileApplication",
        "name": "Event Bondhu",
        "description": "A platform connecting users with verified event artisans for Indian weddings and ceremonies",
        "url": "{{ url('/') }}",
        "applicationCategory": "LifestyleApplication",
        "operatingSystem": "Android",
        "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "INR" },
        "author": { "@@type": "Organization", "name": "Event Bondhu" },
        "aggregateRating": { "@@type": "AggregateRating", "ratingValue": "4.8", "reviewCount": "1200" }
    }
    </script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-saffron-50 overflow-x-hidden">
    @yield('content')
</body>
</html>
