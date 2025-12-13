<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PROVENDA</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }
        .main-wrapper {
            margin-left: 280px; /* Sama dengan lebar sidebar */
            min-height: 100vh;
        }
        @media (max-width: 768px) {
            .main-wrapper {
                margin-left: 0;
            }
            .sidebar-wrapper {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <div class="main-wrapper">
        <!-- Topbar (Opsional) -->
        @if(View::exists('admin.partials.topbar'))
            @include('admin.partials.topbar')
        @endif
        
        <!-- Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>