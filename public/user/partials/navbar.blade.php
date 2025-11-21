<nav class="navbar">
    <div class="container">
        <div class="nav-brand">
            <a href="{{ route('user.index') }}">
                <h2>🎉 Event Promo</h2>
            </a>
        </div>
        <ul class="nav-menu">
            <li>
                <a href="{{ route('user.index') }}#beranda" 
                   class="{{ Request::is('/') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}#tentang">
                    Tentang
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}#layanan">
                    Layanan
                </a>
            </li>
            <li>
                <a href="{{ route('user.events') }}" 
                   class="{{ Request::is('events*') ? 'active' : '' }}">
                    Event
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}#kontak">
                    Kontak
                </a>
            </li>
        </ul>
        <div class="nav-auth">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn-login">Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-register">Logout</button>
                </form>
            @else
                <a href="{{ route('admin.login') }}" class="btn-login">Masuk</a>
                <a href="{{ route('admin.register') }}" class="btn-register">Daftar</a>
            @endauth
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
