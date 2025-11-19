<header class="pc-header shadow-sm bg-white">
    <div class="header-wrapper flex justify-between items-center px-6 py-3">

        {{-- Left (Hamburger + Search) --}}
        <div class="flex items-center gap-4">
            <a href="#" class="pc-toggle-sidebar text-gray-600 text-xl">
                <i class="feather icon-menu"></i>
            </a>

            <div class="relative">
                <input type="text" class="form-control pl-10 py-2 rounded-lg" placeholder="Cari sesuatu...">
                <i class="feather icon-search absolute left-3 top-2.5 text-gray-500"></i>
            </div>
        </div>

        {{-- Right (Icon Settings, Notification, Profile) --}}
        <div class="flex items-center gap-6">

            <a href="#" class="text-gray-600 text-xl">
                <i class="feather icon-sun"></i>
            </a>

            <a href="#" class="relative text-gray-600 text-xl">
                <i class="feather icon-bell"></i>
                <span class="bg-red-500 text-white text-xs px-1 rounded-full absolute -top-1 -right-2">3</span>
            </a>

            <a href="#" class="text-gray-600 text-xl">
                <i class="feather icon-user"></i>
            </a>

        </div>

    </div>
</header>
