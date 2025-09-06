<!-- Sidebar Navigation -->
<div x-data="{ sidebarOpen: false }">
    <!-- Mobile sidebar overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 lg:hidden" @click="sidebarOpen = false">
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>
    </div>

    <!-- Desktop & Tablet Sidebar - Always visible on lg+ screens -->
    <div
        class="sidebar-desktop hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:bg-gradient-to-br lg:from-slate-900 lg:via-blue-900 lg:to-slate-800 lg:shadow-2xl lg:border-r lg:border-blue-700/20 lg:z-30">
        <!-- Desktop Logo -->
        <div class="flex items-center justify-center h-16 px-6 border-b border-blue-700/30 bg-white/5 backdrop-blur-sm">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                <div
                    class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <i class="fas fa-briefcase text-white text-lg"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-lg leading-tight">Job Portal</span>
                    <span class="text-blue-300 text-xs font-medium">BKK System</span>
                </div>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto custom-scrollbar">
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-tachometer-alt text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('dashboard') ? 'font-semibold' : 'font-medium' }}">Dashboard</span>
                @if (request()->routeIs('dashboard'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('dashboard.applications') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard.applications') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard.applications') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-file-alt text-sm"></i>
                </div>
                <span
                    class="{{ request()->routeIs('dashboard.applications') ? 'font-semibold' : 'font-medium' }}">Riwayat
                    Lamaran</span>
                @if (request()->routeIs('dashboard.applications'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('dashboard.payments') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard.payments') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard.payments') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-credit-card text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('dashboard.payments') ? 'font-semibold' : 'font-medium' }}">Riwayat
                    Pembayaran</span>
                @if (request()->routeIs('dashboard.payments'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('landing.jobs') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('landing.jobs') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('landing.jobs') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-search text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('landing.jobs') ? 'font-semibold' : 'font-medium' }}">Cari
                    Lowongan</span>
                @if (request()->routeIs('landing.jobs'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-blue-700/50"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-slate-900 text-blue-300 text-xs font-medium">Quick Access</span>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-1">
                <a href="{{ route('landing.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-white/10 hover:text-white transition-all duration-200 group">
                    <div
                        class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                        <i class="fas fa-home text-xs"></i>
                    </div>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-white/10 hover:text-white transition-all duration-200 group">
                    <div
                        class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                        <i class="fas fa-user-cog text-xs"></i>
                    </div>
                    <span>Pengaturan Profil</span>
                </a>
            </div>
        </nav>

        <!-- Desktop User Profile -->
        <div class="px-4 py-4 border-t border-blue-700/30 bg-white/5 backdrop-blur-sm">
            <div x-data="{ profileOpen: false }" class="relative">
                <button @click="profileOpen = !profileOpen"
                    class="flex items-center w-full px-4 py-3 text-sm font-medium text-white rounded-xl hover:bg-white/10 transition-all duration-300 group">
                    <div class="relative mr-3">
                        <div
                            class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center group-hover:scale-105 transition-all duration-300 shadow-lg">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div
                            class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-slate-900 animate-pulse">
                        </div>
                    </div>
                    <div class="flex-1 text-left min-w-0">
                        <div class="text-sm font-semibold truncate text-white">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-blue-300 truncate">{{ Auth::user()->email }}</div>
                    </div>
                    <i class="fas fa-chevron-up ml-2 text-blue-300 transition-transform duration-300"
                        :class="{ 'rotate-180': profileOpen }"></i>
                </button>

                <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
                    class="mt-3 space-y-1 bg-white/10 backdrop-blur-sm rounded-xl p-2 border border-blue-700/30">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 group">
                        <div
                            class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                            <i class="fas fa-user-cog text-xs"></i>
                        </div>
                        <span>Edit Profil</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-3 py-2 text-sm text-red-300 hover:text-white hover:bg-red-600/80 rounded-lg transition-all duration-200 group">
                            <div
                                class="w-7 h-7 rounded-lg bg-red-800/50 flex items-center justify-center mr-3 group-hover:bg-red-600/50 transition-all duration-200">
                                <i class="fas fa-sign-out-alt text-xs"></i>
                            </div>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar - Only shown when sidebarOpen is true -->
    <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 flex flex-col w-64 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 shadow-2xl z-50 lg:hidden border-r border-blue-700/20">


        <!-- Mobile Logo -->
        <div class="flex items-center justify-center h-16 px-6 border-b border-blue-700/30 bg-white/5 backdrop-blur-sm">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                <div
                    class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <i class="fas fa-briefcase text-white text-lg"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-lg leading-tight">Job Portal</span>
                    <span class="text-blue-300 text-xs font-medium">BKK System</span>
                </div>
            </a>
        </div>

        <!-- Mobile Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto custom-scrollbar">
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-tachometer-alt text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('dashboard') ? 'font-semibold' : 'font-medium' }}">Dashboard</span>
                @if (request()->routeIs('dashboard'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('dashboard.applications') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard.applications') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard.applications') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-file-alt text-sm"></i>
                </div>
                <span
                    class="{{ request()->routeIs('dashboard.applications') ? 'font-semibold' : 'font-medium' }}">Riwayat
                    Lamaran</span>
                @if (request()->routeIs('dashboard.applications'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('dashboard.payments') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard.payments') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard.payments') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-credit-card text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('dashboard.payments') ? 'font-semibold' : 'font-medium' }}">Riwayat
                    Pembayaran</span>
                @if (request()->routeIs('dashboard.payments'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <a href="{{ route('landing.jobs') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 group {{ request()->routeIs('landing.jobs') ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg shadow-blue-600/25 border border-blue-500/30' : 'text-blue-100 hover:bg-white/10 hover:text-white hover:translate-x-1' }}">
                <div
                    class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('landing.jobs') ? 'bg-white/20 text-white' : 'bg-blue-800/50 text-blue-300 group-hover:bg-white/20 group-hover:text-white' }} transition-all duration-300">
                    <i class="fas fa-search text-sm"></i>
                </div>
                <span class="{{ request()->routeIs('landing.jobs') ? 'font-semibold' : 'font-medium' }}">Cari
                    Lowongan</span>
                @if (request()->routeIs('landing.jobs'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full animate-pulse"></div>
                @endif
            </a>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-blue-700/50"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-slate-900 text-blue-300 text-xs font-medium">Quick Access</span>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-1">
                <a href="{{ route('landing.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-white/10 hover:text-white transition-all duration-200 group">
                    <div
                        class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                        <i class="fas fa-home text-xs"></i>
                    </div>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-medium text-blue-200 rounded-lg hover:bg-white/10 hover:text-white transition-all duration-200 group">
                    <div
                        class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                        <i class="fas fa-user-cog text-xs"></i>
                    </div>
                    <span>Pengaturan Profil</span>
                </a>
            </div>
        </nav>

        <!-- Mobile User Profile -->
        <div class="px-4 py-4 border-t border-blue-700/30 bg-white/5 backdrop-blur-sm">
            <div x-data="{ profileOpen: false }" class="relative">
                <button @click="profileOpen = !profileOpen"
                    class="flex items-center w-full px-4 py-3 text-sm font-medium text-white rounded-xl hover:bg-white/10 transition-all duration-300 group">
                    <div class="relative mr-3">
                        <div
                            class="w-11 h-11 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center group-hover:scale-105 transition-all duration-300 shadow-lg">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div
                            class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-slate-900 animate-pulse">
                        </div>
                    </div>
                    <div class="flex-1 text-left min-w-0">
                        <div class="text-sm font-semibold truncate text-white">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-blue-300 truncate">{{ Auth::user()->email }}</div>
                    </div>
                    <i class="fas fa-chevron-up ml-2 text-blue-300 transition-transform duration-300"
                        :class="{ 'rotate-180': profileOpen }"></i>
                </button>

                <div x-show="profileOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
                    class="mt-3 space-y-1 bg-white/10 backdrop-blur-sm rounded-xl p-2 border border-blue-700/30">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center px-3 py-2 text-sm text-blue-200 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 group">
                        <div
                            class="w-7 h-7 rounded-lg bg-blue-800/50 flex items-center justify-center mr-3 group-hover:bg-white/20 transition-all duration-200">
                            <i class="fas fa-user-cog text-xs"></i>
                        </div>
                        <span>Edit Profil</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-3 py-2 text-sm text-red-300 hover:text-white hover:bg-red-600/80 rounded-lg transition-all duration-200 group">
                            <div
                                class="w-7 h-7 rounded-lg bg-red-800/50 flex items-center justify-center mr-3 group-hover:bg-red-600/50 transition-all duration-200">
                                <i class="fas fa-sign-out-alt text-xs"></i>
                            </div>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile header -->
    <div
        class="mobile-header bg-white/95 backdrop-blur-md shadow-lg border-b border-blue-200/50 lg:hidden fixed top-0 left-0 right-0 z-40">
        <div class="flex items-center justify-between px-4 py-3">
            <button @click="sidebarOpen = true"
                class="text-gray-600 hover:text-blue-600 p-2 rounded-xl hover:bg-blue-50 transition-all duration-200 group">
                <i class="fas fa-bars text-lg group-hover:scale-110 transition-transform"></i>
            </button>
            <div class="flex items-center space-x-3">
                <div
                    class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-briefcase text-white text-sm"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-gray-900 font-bold text-sm leading-tight">Job Portal</span>
                    <span class="text-blue-600 text-xs font-medium">BKK System</span>
                </div>
            </div>
            <!-- User menu for mobile -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-all duration-200">
                    <i class="fas fa-user text-white text-xs"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
                    class="absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl border border-blue-200/50 py-2 z-50">
                    <div class="px-4 py-3 border-b border-blue-100">
                        <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-blue-600 truncate font-medium">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-user-cog text-blue-600 text-xs"></i>
                        </div>
                        <span>Pengaturan Profil</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200">
                            <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                <i class="fas fa-sign-out-alt text-red-600 text-xs"></i>
                            </div>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
