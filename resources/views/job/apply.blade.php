<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lamar Pekerjaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Job Info -->
                    <div class="mb-8 bg-blue-50 p-6 rounded-lg">
                        <div class="flex items-start gap-6">
                            <div class="flex-1">
                                <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $vacancy->title }}</h1>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-building mr-2"></i>
                                    <span>{{ $vacancy->company->name }}</span>
                                </div>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-tag mr-2"></i>
                                    <span>{{ $vacancy->category->name }}</span>
                                </div>
                                @if ($vacancy->fee)
                                    <div class="text-lg font-semibold text-blue-600">
                                        Rp {{ number_format($vacancy->fee, 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Application Form -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Lamaran</h2>

                        <form action="{{ route('job.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

                            <div class="mb-6">
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                    <div class="flex items-start">
                                        <i class="fas fa-info-circle text-yellow-500 mr-3 mt-1"></i>
                                        <div>
                                            <h3 class="font-medium text-yellow-800">Informasi Penting</h3>
                                            <p class="text-yellow-700 text-sm mt-1">
                                                Dengan mengklik "Lamar Sekarang", Anda akan mengirimkan lamaran untuk
                                                posisi ini.
                                                Pastikan profil Anda sudah lengkap sebelum melamar.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('landing.job-detail', $vacancy->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg transition duration-300">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali
                                </a>

                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Lamar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
