<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-category">Dashboard</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item nav-category">Manajemen Event</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.event.index') }}">
        <i class="icon-calendar menu-icon"></i>
        <span class="menu-title">Kelola Event</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.promo.index') }}">
        <i class="icon-bullhorn menu-icon"></i>
        <span class="menu-title">Kelola Promosi</span>
      </a>
    </li>

    <li class="nav-item nav-category">Manajemen Pengguna</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.user.index') }}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Data Pengguna</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.komentar.index') }}">
        <i class="icon-speech menu-icon"></i>
        <span class="menu-title">Komentar & Ulasan</span>
      </a>
    </li>

    <li class="nav-item nav-category">Laporan & Statistik</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.laporan') }}">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Laporan & Statistik</span>
      </a>
    </li>

    <li class="nav-item nav-category">Pengaturan</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.settings') }}">
        <i class="icon-settings menu-icon"></i>
        <span class="menu-title">Pengaturan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}">
        <i class="icon-power menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li>

  </ul>
</nav>
