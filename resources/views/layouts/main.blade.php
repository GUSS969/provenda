<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>

    {{-- CSS Datta Able --}}
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/plugins.css">
</head>

<body>

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- HEADER (NAVBAR) --}}
    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto"></div>

            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                            <i class="ti ti-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    {{-- MAIN CONTENT WRAPPER --}}
    <div class="pc-container" style="margin-left: 260px;">
        <div class="pc-content">

            {{-- PAGE CONTENT --}}
            @yield('content')

        </div>
    </div>

    {{-- JS --}}
    <script src="/admin/assets/js/plugins.js"></script>
    <script src="/admin/assets/js/pcoded.js"></script>
</body>
</html>
