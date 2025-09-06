<x-home title="Lowongan Kerja - JobBKK"
    description="Temukan lowongan kerja terbaru dari berbagai perusahaan terpercaya di JobBKK.">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Lowongan Kerja</h1>
                <p class="text-xl text-blue-100">Temukan pekerjaan impian Anda dari perusahaan terpercaya</p>
            </div>
        </div>
    </section>

    <!-- Search & Filter -->
    <section class="py-8 bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <form action="{{ route('landing.jobs') }}" method="GET" class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari posisi atau perusahaan..."
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="w-full md:w-64">
                        <select name="category"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            @if ($vacancies->count() > 0)
                <div class="mb-6">
                    <p class="text-gray-600">
                        Menampilkan {{ $vacancies->firstItem() }}-{{ $vacancies->lastItem() }} dari
                        {{ $vacancies->total() }} lowongan kerja
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($vacancies as $vacancy)
                        <x-job-card :vacancy="$vacancy" />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $vacancies->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-search text-6xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-600 mb-2">Tidak ada lowongan ditemukan</h3>
                    <p class="text-gray-500 mb-6">Coba ubah kata kunci pencarian atau filter kategori</p>
                    <a href="{{ route('landing.jobs') }}"
                        class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Lihat Semua Lowongan
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-home>
