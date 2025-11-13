<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProvenDa | Promosi Event Daerah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
                        url('https://images.unsplash.com/photo-1526948128573-703ee1aeb6fa?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        .hero h1 {
            font-weight: 700;
        }
        .card:hover {
            transform: scale(1.02);
            transition: 0.3s;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">ProvenDa</a>
            <div class="d-flex">
                <a href="/admin/dashboard" class="btn btn-light btn-sm">Masuk Admin</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Promosikan Event Daerah Anda Lebih Luas!</h1>
            <p class="lead mt-3">Tingkatkan jangkauan promosi event daerah Anda dengan platform digital ProvenDa.</p>
            <a href="/admin/dashboard" class="btn btn-outline-light mt-3">Lihat Dashboard</a>
        </div>
    </section>

    <!-- Statistik -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">128+</h3>
                    <p>Event Dipromosikan</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">980.400+</h3>
                    <p>Jangkauan Promosi</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-primary">54 Media</h3>
                    <p>Partner Aktif</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Terbaru -->
    <section class="container py-5">
        <h2 class="text-center mb-4 fw-bold">Event Daerah Terbaru</h2>

        <div class="row">
            @if(isset($events) && count($events) > 0)
                @foreach($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ $event->gambar ?? 'https://via.placeholder.com/400x250?text=Event+Image' }}" class="card-img-top" alt="{{ $event->nama_event }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                <p class="card-text text-muted">{{ $event->lokasi }}</p>
                                <p class="small text-secondary">Tanggal: {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-muted">Belum ada event terbaru.</p>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center bg-dark text-white py-4">
        <div class="container">
            <p class="mb-1">© 2025 ProvenDa - Promosi Event Daerah</p>
            <small>Dikelola oleh Tim Pengembang ProvenDa</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
