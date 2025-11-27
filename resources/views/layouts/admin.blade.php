<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Admin Panel') - EventPromo</title>

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Admin CSS (main theme file) --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashboard.css') }}">

    @stack('styles')
</head>

<body>
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Content area --}}
    <div class="content-wrapper">
        @includeWhen(View::exists('admin.partials.topbar'), 'admin.partials.topbar')
        <main class="pc-content">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/assets/js/admin-ui.js') }}"></script>
    @stack('scripts')
</body>

</html>
