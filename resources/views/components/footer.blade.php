<footer class="bg-gray-800 text-white mt-16">
    <div class="container mx-auto px-4 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="bg-blue-600 text-white p-2 rounded-lg">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <span class="text-xl font-bold">Job<span class="text-blue-400">BKK</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Platform pencarian kerja yang menghubungkan perusahaan terpercaya dengan talenta terbaik di
                    Indonesia.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="font-semibold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('landing.index') }}"
                            class="text-gray-400 hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('landing.jobs') }}" class="text-gray-400 hover:text-white transition">Lowongan
                            Kerja</a></li>
                    <li><a href="{{ route('landing.companies') }}"
                            class="text-gray-400 hover:text-white transition">Perusahaan</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="font-semibold mb-4">Kategori Pekerjaan</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">IT & Software</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Marketing</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Finance</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Human Resources</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center text-gray-400">
                        <i class="fas fa-envelope mr-2"></i>
                        info@jobbkk.com
                    </li>
                    <li class="flex items-center text-gray-400">
                        <i class="fas fa-phone mr-2"></i>
                        +62 21 1234 5678
                    </li>
                    <li class="flex items-center text-gray-400">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Jakarta, Indonesia
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400 text-sm">
                © {{ date('Y') }} JobBKK. All rights reserved.
            </p>
        </div>
    </div>
</footer>
