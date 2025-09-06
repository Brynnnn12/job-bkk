<x-home title="JobBKK - Portal Lowongan Kerja Terpercaya"
    description="Temukan lowongan kerja impian Anda di JobBKK. Platform terpercaya yang menghubungkan perusahaan dengan talenta terbaik.">

    <!-- Hero Section -->
    <x-hero-section title="Temukan Karir <span class='text-yellow-400'>Impian</span> Anda"
        subtitle="Platform terpercaya untuk menghubungkan Anda dengan perusahaan terbaik di Indonesia"
        :categories="$categories" />

    <!-- Statistics Section -->
    <x-statistics-section :totalVacancies="$totalVacancies" :totalCompanies="$totalCompanies" :totalCategories="$totalCategories" />

    <!-- Latest Jobs Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Lowongan Kerja <span class="text-blue-600">Terbaru</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Jangan lewatkan kesempatan emas untuk berkarir di perusahaan impian Anda
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($latestVacancies as $vacancy)
                    <x-job-card :vacancy="$vacancy" />
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('landing.jobs') }}"
                    class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                    Lihat Semua Lowongan
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Companies Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Perusahaan <span class="text-blue-600">Terpercaya</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Bergabunglah dengan perusahaan-perusahaan terkemuka yang telah mempercayai JobBKK
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($companies as $company)
                    <x-company-card :company="$company" />
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('landing.companies') }}"
                    class="inline-flex items-center bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-900 transition duration-300 font-semibold">
                    Lihat Semua Perusahaan
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Siap Memulai Karir Baru?
            </h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">
                Daftar sekarang dan dapatkan akses ke ribuan lowongan kerja terbaik dari perusahaan terpercaya
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                    class="bg-yellow-500 text-gray-800 px-8 py-3 rounded-lg hover:bg-yellow-400 transition duration-300 font-bold">
                    Daftar Sekarang
                </a>
                <a href="{{ route('landing.jobs') }}"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300 font-semibold">
                    Jelajahi Lowongan
                </a>
            </div>
        </div>
    </section>
</x-home>
