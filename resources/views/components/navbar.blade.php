<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="bg-blue-600 text-white p-2 rounded-lg">
                    <i class="fas fa-briefcase text-xl"></i>
                </div>
                <a href="{{ route('landing.index') }}" class="text-2xl font-bold text-gray-800">
                    Job<span class="text-blue-600">BKK</span>
                </a>
            </div>

            <!-- Navigation Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('landing.index') }}"
                    class="text-gray-700 hover:text-blue-600 transition duration-300 {{ Route::currentRouteName() == 'landing.index' ? 'text-blue-600 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('landing.jobs') }}"
                    class="text-gray-700 hover:text-blue-600 transition duration-300 {{ Route::currentRouteName() == 'landing.jobs' ? 'text-blue-600 font-semibold' : '' }}">
                    Lowongan Kerja
                </a>
                <a href="{{ route('landing.companies') }}"
                    class="text-gray-700 hover:text-blue-600 transition duration-300 {{ Route::currentRouteName() == 'landing.companies' ? 'text-blue-600 font-semibold' : '' }}">
                    Perusahaan
                </a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">
                        <i class="fas fa-user mr-2"></i>Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('landing.index') }}" class="text-gray-700 hover:text-blue-600 py-2">Beranda</a>
                <a href="{{ route('landing.jobs') }}" class="text-gray-700 hover:text-blue-600 py-2">Lowongan Kerja</a>
                <a href="{{ route('landing.companies') }}"
                    class="text-gray-700 hover:text-blue-600 py-2">Perusahaan</a>
            </div>
        </div>
    </div>
</nav>
