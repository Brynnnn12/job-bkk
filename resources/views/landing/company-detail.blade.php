<x-home title="{{ $company->name }} - Profil Perusahaan | JobBKK"
    description="Lihat profil lengkap {{ $company->name }} dan lowongan kerja yang tersedia. {{ Str::limit($company->description ?? '', 150) }}">
    <!-- Company Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-4">
                    <a href="{{ route('landing.companies') }}"
                        class="inline-flex items-center text-blue-200 hover:text-white transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Perusahaan
                    </a>
                </div>

                <div class="flex flex-col md:flex-row md:items-center gap-6">
                    <div class="flex-shrink-0">
                        @if ($company->logo)
                            <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}"
                                class="w-24 h-24 object-contain bg-white rounded-xl p-4">
                        @else
                            <div class="w-24 h-24 bg-white rounded-xl flex items-center justify-center">
                                <i class="fas fa-building text-blue-600 text-4xl"></i>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $company->name }}</h1>

                        @if ($company->address)
                            <div class="flex items-center mb-4">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-300"></i>
                                <span class="text-blue-100">{{ $company->address }}</span>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <i class="fas fa-briefcase mr-2 text-green-300"></i>
                            <span class="text-lg font-semibold">{{ $vacancies->total() }} lowongan tersedia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Info -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                @if ($company->description)
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tentang Perusahaan</h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($company->description)) !!}
                        </div>
                    </div>
                @endif

                <!-- Company Stats -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl text-center">
                        <div
                            class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-600 mb-1">{{ $vacancies->total() }}</h3>
                        <p class="text-gray-600">Lowongan Aktif</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl text-center">
                        <div
                            class="bg-green-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-600 mb-1">{{ $company->created_at->format('Y') }}</h3>
                        <p class="text-gray-600">Bergabung Sejak</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl text-center">
                        <div
                            class="bg-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-purple-600 mb-1">4.5</h3>
                        <p class="text-gray-600">Rating Perusahaan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Jobs -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    Lowongan dari <span class="text-blue-600">{{ $company->name }}</span>
                </h2>

                @if ($vacancies->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($vacancies as $vacancy)
                            <x-job-card :vacancy="$vacancy" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $vacancies->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="text-gray-400 mb-4">
                            <i class="fas fa-briefcase text-6xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-600 mb-2">Belum ada lowongan tersedia</h3>
                        <p class="text-gray-500 mb-6">{{ $company->name }} sedang tidak membuka lowongan saat ini</p>
                        <a href="{{ route('landing.jobs') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-search mr-2"></i>Cari Lowongan Lain
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-home>
