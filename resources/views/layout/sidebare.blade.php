<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header flex items-center py-4 px-6 h-header-height">
      <a href="{{ route('admin.dashboard') }}" class="b-brand flex items-center gap-3">
        <img src="{{ asset('admin/assets/images/logo-white.svg') }}" class="img-fluid logo logo-lg" alt="logo" />
        <img src="{{ asset('admin/assets/images/favicon.svg') }}" class="img-fluid logo logo-sm" alt="logo" />
      </a>
    </div>

    <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
      <ul class="pc-navbar">

        <!-- Menu Utama -->
        <li class="pc-item pc-caption"><label>Menu Utama</label></li>

        <li class="pc-item">
          <a href="{{ route('admin.dashboard') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="home"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <!-- Manajemen Event -->
        <li class="pc-item pc-caption"><label>Manajemen Event</label></li>

        <li class="pc-item">
          <a href="{{ route('admin.event.index') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="calendar"></i></span>
            <span class="pc-mtext">Data Event</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('admin.event.create') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="plus-circle"></i></span>
            <span class="pc-mtext">Tambah Event</span>
          </a>
        </li>

        <!-- Promosi & Partner -->
        <li class="pc-item pc-caption"><label>Promosi & Partner</label></li>

        <li class="pc-item">
          <a href="{{ route('admin.promosi.index') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="bell"></i></span>
            <span class="pc-mtext">Paket Promosi</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('admin.partner.index') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="handshake"></i></span>
            <span class="pc-mtext">Daftar Partner</span>
          </a>
        </li>

        <!-- Pengaturan -->
        <li class="pc-item pc-caption"><label>Pengaturan</label></li>

        <li class="pc-item">
          <a href="{{ route('admin.profile') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="user"></i></span>
            <span class="pc-mtext">Profil Admin</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('logout') }}" class="pc-link">
            <span class="pc-micon"><i data-feather="log-out"></i></span>
            <span class="pc-mtext">Logout</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- [ Sidebar Menu ] end -->
