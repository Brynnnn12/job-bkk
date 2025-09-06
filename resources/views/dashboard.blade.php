<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Kelola lamaran pekerjaan Anda dan temukan peluang karir terbaik.</p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $applications = \App\Models\JobRegistration::where('user_id', Auth::id());
                    $totalApplications = $applications->count();
                    $pendingApplications = $applications->where('status', 'pending')->count();
                    $approvedApplications = $applications->where('status', 'approved')->count();
                @endphp

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Lamaran</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $totalApplications }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Menunggu</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $pendingApplications }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Diterima</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $approvedApplications }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Aksi Cepat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('dashboard.applications') }}"
                            class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition duration-300">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-list text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Riwayat Lamaran</h4>
                                <p class="text-sm text-gray-600">Lihat semua lamaran yang telah Anda kirim</p>
                            </div>
                        </a>

                        <a href="{{ route('landing.jobs') }}"
                            class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition duration-300">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-4">
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Lamaran Terbaru</h3>
                            <a href="{{ route('dashboard.applications') }}"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Lihat Semua
                            </a>
                        </div>

                        @php
                            $recentApplications = \App\Models\JobRegistration::with([
                                'vacancy.company',
                                'vacancy.category',
                            ])
                                ->where('user_id', Auth::id())
                                ->latest()
                                ->take(3)
                                ->get();
                        @endphp

                        <div class="space-y-3">
                            @foreach ($recentApplications as $application)
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $application->vacancy->title }}</h4>
                                        <p class="text-sm text-gray-600">{{ $application->vacancy->company->name }}</p>
                                    </div>
                                    <div class="text-right">
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'approved' => 'bg-green-100 text-green-800',
                                                'rejected' => 'bg-red-100 text-red-800',
                                            ];
                                            $statusLabels = [
                                                'pending' => 'Menunggu',
                                                'approved' => 'Diterima',
                                                'rejected' => 'Ditolak',
                                            ];
                                        @endphp
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $statusClasses[$application->status] }}">
                                            {{ $statusLabels[$application->status] }}
                                        </span>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $application->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
