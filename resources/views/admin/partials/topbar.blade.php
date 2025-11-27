<nav class="navbar navbar-light bg-light shadow-sm px-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h6">@yield('title', 'Dashboard')</span>
        <div class="d-flex align-items-center">
            <a href="{{ route('user.home') }}" class="btn btn-outline-secondary btn-sm me-2">View Site</a>
            <span class="badge bg-secondary">Admin</span>
        </div>
    </div>
</nav>
