<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta_description', 'Platform promosi event daerah terpercaya di Indonesia')">
    <meta name="keywords" content="@yield('meta_keywords', 'event, promosi event, event daerah, festival')">
    
    <title>@yield('title', 'Event Promo') - Jasa Promosi Event Daerah</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body>
    
    <!-- Navbar -->
    @include('user.partials.navbar')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('user.partials.footer')
    
    <!-- JavaScript -->
    <script src="{{ asset('user/js/script.js') }}"></script>
    
    <!-- Custom Scripts -->
    @stack('scripts')
    
</body>
</html>
