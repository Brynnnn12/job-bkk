@props(['title', 'subtitle', 'categories' => []])

<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                {{ $title }}
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                {{ $subtitle }}
            </p>

            <!-- Search Form -->
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
                <form action="{{ route('landing.jobs') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" placeholder="Cari posisi atau perusahaan..."
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800">
                    </div>
                    <div class="flex-1">
                        <select name="category"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                        <i class="fas fa-search mr-2"></i>Cari Kerja
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
