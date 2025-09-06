<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-tachometer-alt text-white"></i>
            </div>
            <span>Dashboard</span>
        </div>
    </x-slot>

    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold mb-2">Selamat datang kembali, {{ Auth::user()->name }}!</h1>
                        <p class="text-blue-100">Kelola lamaran pekerjaan Anda dan temukan peluang karir terbaik.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-tie text-white text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @php
                $applications = \App\Models\JobRegistration::where('user_id', Auth::id());
                $totalApplications = $applications->count();
                $pendingApplications = $applications->where('status', 'pending')->count();
                $approvedApplications = $applications->where('status', 'approved')->count();
                $rejectedApplications = $applications->where('status', 'rejected')->count();
            @endphp

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Total Lamaran</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $totalApplications }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-paper-plane text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Menunggu</p>
                            <p class="text-3xl font-bold text-yellow-600">{{ $pendingApplications }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Diterima</p>
                            <p class="text-3xl font-bold text-green-600">{{ $approvedApplications }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Ditolak</p>
                            <p class="text-3xl font-bold text-red-600">{{ $rejectedApplications }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-times-circle text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-6 flex items-center">
                    <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                    Aksi Cepat
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('dashboard.applications') }}"
                        class="group flex items-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-lg transition-all duration-300 border border-blue-200">
                        <div
                            class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-list text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Riwayat Lamaran</h4>
                            <p class="text-sm text-gray-600">Lihat semua lamaran Anda</p>
                        </div>
                    </a>

                    <a href="{{ route('dashboard.payments') }}"
                        class="group flex items-center p-4 bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-lg transition-all duration-300 border border-green-200">
                        <div
                            class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-credit-card text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Riwayat Pembayaran</h4>
                            <p class="text-sm text-gray-600">Kelola pembayaran Anda</p>
                        </div>
                    </a>

                    <a href="{{ route('landing.jobs') }}"
                        class="group flex items-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-lg transition-all duration-300 border border-purple-200">
                        <div
                            class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-search text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Cari Lowongan</h4>
                            <p class="text-sm text-gray-600">Temukan peluang kerja baru</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Applications -->
        @if ($totalApplications > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fas fa-history text-gray-500 mr-2"></i>
                            Lamaran Terbaru
                        </h3>
                        <a href="{{ route('dashboard.applications') }}"
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                            Lihat Semua
                            <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    @php
                        $recentApplications = \App\Models\JobRegistration::with(['vacancy.company', 'vacancy.category'])
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->take(5)
                            ->get();
                    @endphp

                    <div class="space-y-4">
                        @foreach ($recentApplications as $application)
                            <div
                                class="flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg border border-gray-200 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-briefcase text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $application->vacancy->title }}</h4>
                                        <p class="text-sm text-gray-600">{{ $application->vacancy->company->name }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ $application->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                            'approved' => 'bg-green-100 text-green-800 border-green-200',
                                            'rejected' => 'bg-red-100 text-red-800 border-red-200',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Menunggu',
                                            'approved' => 'Diterima',
                                            'rejected' => 'Ditolak',
                                        ];
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full border {{ $statusClasses[$application->status] }}">
                                        @if ($application->status === 'pending')
                                            <i class="fas fa-clock mr-1"></i>
                                        @elseif($application->status === 'approved')
                                            <i class="fas fa-check-circle mr-1"></i>
                                        @else
                                            <i class="fas fa-times-circle mr-1"></i>
                                        @endif
                                        {{ $statusLabels[$application->status] }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <!-- No Applications Yet -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="p-12 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum ada lamaran</h3>
                    <p class="text-gray-600 mb-6">Mulai perjalanan karir Anda dengan melamar pekerjaan yang tersedia.
                    </p>
                    <a href="{{ route('landing.jobs') }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-search mr-2"></i>
                        Cari Lowongan Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
