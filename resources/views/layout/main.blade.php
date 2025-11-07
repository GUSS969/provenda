<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Promosi Event Daerah</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #ecf0f1;
        }

        /* Sidebar */
        #sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            flex-shrink: 0;
            padding-top: 20px;
        }

        #sidebar .nav-link {
            color: #bdc3c7;
            font-weight: 500;
        }

        #sidebar .nav-link.active,
        #sidebar .nav-link:hover {
            color: #fff;
            background-color: #34495e;
            border-radius: 5px;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 1px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    @include('layouts.sidebar')

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
