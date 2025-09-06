<x-home title="Perusahaan Terpercaya - JobBKK"
    description="Temukan perusahaan-perusahaan terpercaya yang menyediakan lowongan kerja terbaik di JobBKK.">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Perusahaan Terpercaya</h1>
                <p class="text-xl text-blue-100">Bergabunglah dengan perusahaan-perusahaan terkemuka di Indonesia</p>
            </div>
        </div>
    </section>

    <!-- Companies Grid -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            @if ($companies->count() > 0)
                <div class="mb-6">
                    <p class="text-gray-600">
                        Menampilkan {{ $companies->firstItem() }}-{{ $companies->lastItem() }} dari
                        {{ $companies->total() }} perusahaan
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($companies as $company)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 p-6">
                            <div class="text-center mb-4">
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}"
                                        class="w-20 h-20 mx-auto object-contain mb-4">
                                @else
                                    <div
                                        class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-building text-blue-600 text-3xl"></i>
                                    </div>
                                @endif

                                <h3 class="font-bold text-lg text-gray-800 mb-2 hover:text-blue-600 transition">
                                    <a href="{{ route('landing.company-detail', $company->slug) }}">
                                        {{ $company->name }}
                                    </a>
                                </h3>

                                @if ($company->description)
                                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                        {{ Str::limit($company->description, 100) }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-center text-blue-600 mb-4">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    <span class="font-semibold">{{ $company->vacancies_count }} lowongan aktif</span>
                                </div>

                                <a href="{{ route('landing.company-detail', $company->slug) }}"
                                    class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $companies->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-building text-6xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-2">Belum ada perusahaan terdaftar</h3>
                    <p class="text-gray-500">Silakan kembali lagi nanti</p>
                </div>
            @endif
        </div>
    </section>
</x-home>
