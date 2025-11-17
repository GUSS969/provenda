@extends('layout.main')
@section('title','Dashboard')
@section('content')
<div class="pc-content">

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="page-header-title">
          <h5 class="mb-0 font-medium">Dashboard Promosi Event Daerah</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page">Event Daerah</li>
        </ul>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="grid grid-cols-12 gap-x-6">

      <!-- TOTAL EVENT DIPROMOSIKAN -->
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
          <div class="card-header !pb-0 !border-b-0">
            <h5>Total Event Dipromosikan</h5>
          </div>
          <div class="card-body">
            <div class="flex items-center justify-between gap-3 flex-wrap">
              <h3 class="font-light flex items-center mb-0">
                <i class="feather icon-arrow-up text-success-500 text-[30px] mr-1.5"></i>
                128 Event
              </h3>
              <p class="mb-0">+14%</p>
            </div>
            <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 75%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- TOTAL JANGKAUAN PROMOSI -->
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card">
          <div class="card-header !pb-0 !border-b-0">
            <h5>Total Jangkauan Promosi</h5>
          </div>
          <div class="card-body">
            <div class="flex items-center justify-between gap-3 flex-wrap">
              <h3 class="font-light flex items-center mb-0">
                <i class="feather icon-arrow-up text-success-500 text-[30px] mr-1.5"></i>
                980.400+
              </h3>
              <p class="mb-0">+28%</p>
            </div>
            <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6">
              <div class="bg-theme-bg-2 h-full rounded-lg" style="width: 60%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- TOTAL PARTNER MEDIA -->
      <div class="col-span-12 xl:col-span-4">
        <div class="card">
          <div class="card-header !pb-0 !border-b-0">
            <h5>Partner Media Aktif</h5>
          </div>
          <div class="card-body">
            <div class="flex items-center justify-between gap-3 flex-wrap">
              <h3 class="font-light flex items-center mb-0">
                <i class="feather icon-arrow-up text-success-500 text-[30px] mr-1.5"></i>
                54 Media
              </h3>
              <p class="mb-0">+9%</p>
            </div>
            <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 80%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- FACEBOOK STATS -->
      <div class="col-span-12 xl:col-span-4">
        <div class="card card-social">
          <div class="card-body border-b">
            <div class="flex items-center justify-center">
              <div class="shrink-0">
                <i class="fab fa-facebook-f text-primary-500 text-[36px]"></i>
              </div>
              <div class="grow text-right">
                <h3 class="mb-2">42,800</h3>
                <h5 class="text-success-500 mb-0">+12% <span class="text-muted">Reach Bulanan</span></h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="grid grid-cols-12 gap-x-6">
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Target: 80,000</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 55%"></div>
                </div>
              </div>
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Engagement: 3.2K</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-theme-bg-2 h-full rounded-lg" style="width: 40%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- INSTAGRAM STATS -->
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card card-social">
          <div class="card-body border-b">
            <div class="flex items-center justify-center">
              <div class="shrink-0">
                <i class="fab fa-instagram text-pink-500 text-[36px]"></i>
              </div>
              <div class="grow text-right">
                <h3 class="mb-2">68,900</h3>
                <h5 class="text-purple-500 mb-0">+18% <span class="text-muted">Reach Bulanan</span></h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="grid grid-cols-12 gap-x-6">
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Target: 120,000</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-success-500 h-full rounded-lg" style="width: 45%"></div>
                </div>
              </div>
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Engagement: 7.9K</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-primary-500 h-full rounded-lg" style="width: 70%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- TIKTOK STATS -->
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card card-social">
          <div class="card-body border-b">
            <div class="flex items-center justify-center">
              <div class="shrink-0">
                <i class="fab fa-tiktok text-black text-[36px]"></i>
              </div>
              <div class="grow text-right">
                <h3 class="mb-2">120,300</h3>
                <h5 class="text-purple-500 mb-0">+22% <span class="text-muted">Views Bulanan</span></h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="grid grid-cols-12 gap-x-6">
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Target: 200,000</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 60%"></div>
                </div>
              </div>
              <div class="col-span-6">
                <h6 class="text-center mb-2.5">Engagement: 9.4K</h6>
                <div class="w-full bg-theme-bodybg h-1.5 rounded-lg">
                  <div class="bg-theme-bg-2 h-full rounded-lg" style="width: 50%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RATING LAYANAN PROMOSI -->
      <div class="col-span-12 xl:col-span-4 md:col-span-6">
        <div class="card user-list">
          <div class="card-header">
            <h5>Rating Layanan Promosi</h5>
          </div>
          <div class="card-body">
            <div class="flex items-center justify-between">
              <h2 class="font-light flex items-center m-0">
                4.8
                <i class="fas fa-star text-warning-500 ml-2.5"></i>
              </h2>
              <h6 class="flex items-center m-0">
                +0.3
                <i class="fas fa-caret-up text-success text-[22px] ml-2.5"></i>
              </h6>
            </div>

            <br>

            <!-- rating breakdown sama kaya template -->
            <div class="flex items-center justify-between mb-2">
              <h6><i class="fas fa-star text-warning-500 mr-2.5"></i>5</h6>
              <h6>450</h6>
            </div>
            <div class="w-full bg-theme-bodybg h-1.5 mb-4">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 75%"></div>
            </div>

            <div class="flex items-center justify-between mb-2">
              <h6><i class="fas fa-star text-warning-500 mr-2.5"></i>4</h6>
              <h6>120</h6>
            </div>
            <div class="w-full bg-theme-bodybg h-1.5 mb-4">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 30%"></div>
            </div>

            <div class="flex items-center justify-between mb-2">
              <h6><i class="fas fa-star text-warning-500 mr-2.5"></i>3</h6>
              <h6>12</h6>
            </div>
            <div class="w-full bg-theme-bodybg h-1.5 mb-4">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 10%"></div>
            </div>

            <div class="flex items-center justify-between mb-2">
              <h6><i class="fas fa-star text-warning-500 mr-2.5"></i>2</h6>
              <h6>3</h6>
            </div>
            <div class="w-full bg-theme-bodybg h-1.5 mb-4">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 5%"></div>
            </div>

            <div class="flex items-center justify-between mb-2">
              <h6><i class="fas fa-star text-warning-500 mr-2.5"></i>1</h6>
              <h6>0</h6>
            </div>
            <div class="w-full bg-theme-bodybg h-1.5">
              <div class="bg-theme-bg-1 h-full rounded-lg" style="width: 0%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- DAFTAR EVENT TERBARU -->
<!-- DAFTAR EVENT TERBARU – PREMIUM V3 -->
<div class="col-span-12">
  <div class="card">

    <div class="card-header">
      <h5>Event Daerah Terbaru</h5>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- EVENT 1 -->
        <div class="relative overflow-hidden rounded-2xl shadow-xl backdrop-blur bg-white/60 border hover:scale-[1.02] transition">
          
          <!-- Ribbon -->
          <div class="absolute top-0 right-0 bg-theme-bg-1 text-white px-4 py-1 text-xs rounded-bl-xl shadow">
            Selesai
          </div>

          <img src="{{ asset('admin/assets/images/event1.jpg') }}" class="w-full h-44 object-cover">

          <div class="p-4">
            <h4 class="font-bold text-lg">Festival Budaya Bahari Bengkalis</h4>

            <div class="flex items-center gap-2 text-muted text-sm mt-2">
              <i class="ti ti-calendar"></i> 15 FEB 09:00
            </div>

            <p class="text-sm mt-3">
              Promosi IG Ads, FB Ads, TikTok Boost + Media Lokal.
            </p>

            <div class="flex items-center gap-3 mt-4 text-muted text-xs">
              <span><i class="ti ti-brand-instagram"></i> Instagram</span>
              <span><i class="ti ti-brand-tiktok"></i> TikTok</span>
              <span><i class="ti ti-brand-facebook"></i> Facebook</span>
            </div>
          </div>
        </div>

        <!-- EVENT 2 -->
        <div class="relative overflow-hidden rounded-2xl shadow-xl backdrop-blur bg-white/60 border hover:scale-[1.02] transition">

          <div class="absolute top-0 right-0 bg-theme-bg-1 text-white px-4 py-1 text-xs rounded-bl-xl shadow">
            Selesai
          </div>

          <img src="{{ asset('admin/assets/images/event2.jpg') }}" class="w-full h-44 object-cover">

          <div class="p-4">
            <h4 class="font-bold text-lg">Festival Lampu Colok Bengkalis</h4>

            <div class="flex items-center gap-2 text-muted text-sm mt-2">
              <i class="ti ti-calendar"></i> 01 APR 19:11
            </div>

            <p class="text-sm mt-3">
              Promosi TikTok Viral + Fotografer Dokumentasi.
            </p>

            <div class="flex items-center gap-3 mt-4 text-muted text-xs">
              <span><i class="ti ti-brand-tiktok"></i> TikTok</span>
              <span><i class="ti ti-brand-facebook"></i> FB Fanspage</span>
            </div>
          </div>
        </div>

        <!-- EVENT 3 -->
        <div class="relative overflow-hidden rounded-2xl shadow-xl backdrop-blur bg-white/60 border hover:scale-[1.02] transition">

          <div class="absolute top-0 right-0 bg-theme-bg-1 text-white px-4 py-1 text-xs rounded-bl-xl shadow">
            Selesai
          </div>

          <img src="{{ asset('admin/assets/images/event3.jpg') }}" class="w-full h-44 object-cover">

          <div class="p-4">
            <h4 class="font-bold text-lg">Bengkalis Expo &amp; UMKM Fair</h4>

            <div class="flex items-center gap-2 text-muted text-sm mt-2">
              <i class="ti ti-calendar"></i> 22 JUL 10:00
            </div>

            <p class="text-sm mt-3">
              Full Campaign + Influencer Lokal + Fotografer.
            </p>

            <div class="flex items-center gap-3 mt-4 text-muted text-xs">
              <span><i class="ti ti-brand-instagram"></i> Instagram</span>
              <span><i class="ti ti-brand-youtube"></i> YouTube</span>
            </div>
          </div>
        </div>

        <!-- EVENT 4 -->
        <div class="relative overflow-hidden rounded-2xl shadow-xl backdrop-blur bg-white/60 border hover:scale-[1.02] transition">

          <div class="absolute top-0 right-0 bg-theme-bg-1 text-white px-4 py-1 text-xs rounded-bl-xl shadow">
            Selesai
          </div>

          <img src="{{ asset('admin/assets/images/event4.jpg') }}" class="w-full h-44 object-cover">

          <div class="p-4">
            <h4 class="font-bold text-lg">Pawai Takbir Bengkalis</h4>

            <div class="flex items-center gap-2 text-muted text-sm mt-2">
              <i class="ti ti-calendar"></i> 09 APR 20:00
            </div>

            <p class="text-sm mt-3">
              Liputan Video Drone + Promosi Sosial Media Paket Full.
            </p>

            <div class="flex items-center gap-3 mt-4 text-muted text-xs">
              <span><i class="ti ti-drone"></i> Drone</span>
              <span><i class="ti ti-brand-facebook"></i> Facebook</span>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
<!-- [ Main Content ] end -->


  </div>
</div>
@endsection
