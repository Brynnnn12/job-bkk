<x-home title="{{ $vacancy->title }} - {{ $vacancy->company->name }} | JobBKK"
    description="Lamar sekarang untuk posisi {{ $vacancy->title }} di {{ $vacancy->company->name }}. {{ Str::limit(strip_tags($vacancy->description), 150) }}">
    <!-- Job Header -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="mb-4">
                    <a href="{{ route('landing.jobs') }}"
                        class="inline-flex items-center text-blue-200 hover:text-white transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Lowongan
                    </a>
                </div>

                <div class="flex flex-col md:flex-row md:items-start gap-6">
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $vacancy->title }}</h1>

                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-building mr-2 text-blue-300"></i>
                                <a href="{{ route('landing.company-detail', $vacancy->company->slug) }}"
                                    class="text-blue-100 hover:text-white transition">
                                    {{ $vacancy->company->name }}
                                </a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tag mr-2 text-green-300"></i>
                                <span>{{ $vacancy->category->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2 text-yellow-300"></i>
                                <span>{{ $vacancy->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <div class="text-2xl font-bold text-yellow-400">
                            @if ($vacancy->fee)
                                Rp {{ number_format($vacancy->fee, 0, ',', '.') }}
                            @else
                                Gratis
                            @endif
                        </div>
                    </div>

                    <div class="flex-shrink-0">
                        @auth
                            @php
                                $alreadyApplied = \App\Models\JobRegistration::where('user_id', Auth::id())
                                    ->where('vacancy_id', $vacancy->id)
                                    ->exists();
                            @endphp

                            @if ($alreadyApplied)
                                <div class="bg-gray-500 text-white px-8 py-3 rounded-lg font-bold">
                                    <i class="fas fa-check mr-2"></i>Sudah Melamar
                                </div>
                            @elseif ($vacancy->status !== 'open')
                                <div class="bg-gray-500 text-white px-8 py-3 rounded-lg font-bold">
                                    <i class="fas fa-times mr-2"></i>Lowongan Ditutup
                                </div>
                            @elseif (Auth::user()->hasRole('Admin'))
                                <div class="bg-gray-500 text-white px-8 py-3 rounded-lg font-bold">
                                    <i class="fas fa-user-shield mr-2"></i>Admin Tidak Bisa Melamar
                                </div>
                            @else
                                <a href="{{ route('job.apply', $vacancy->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-400 text-gray-800 px-8 py-3 rounded-lg font-bold transition duration-300 inline-block">
                                    <i class="fas fa-paper-plane mr-2"></i>Lamar Sekarang
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-block bg-yellow-500 hover:bg-yellow-400 text-gray-800 px-8 py-3 rounded-lg font-bold transition duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Melamar
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Details -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Job Description -->
                    <div class="md:col-span-2">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Deskripsi Pekerjaan</h2>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! nl2br(e($vacancy->description)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Job Info Sidebar -->
                    <div class="space-y-6">
                        <!-- Quick Info -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="font-bold text-lg text-gray-800 mb-4">Informasi Lowongan</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Posisi</span>
                                    <span class="font-semibold">{{ $vacancy->title }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Kategori</span>
                                    <span class="font-semibold">{{ $vacancy->category->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pembayaran</span>
                                    <span class="font-semibold text-blue-600">
                                        @if ($vacancy->fee)
                                            Rp {{ number_format($vacancy->fee, 0, ',', '.') }}
                                        @else
                                            Gratis
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status</span>
                                    <span
                                        class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-semibold">
                                        {{ ucfirst($vacancy->status) }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Diposting</span>
                                    <span class="font-semibold">{{ $vacancy->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Company Info -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="font-bold text-lg text-gray-800 mb-4">Tentang Perusahaan</h3>
                            <div class="text-center mb-4">
                                @if ($vacancy->company->logo)
                                    <img src="{{ Storage::url($vacancy->company->logo) }}"
                                        alt="{{ $vacancy->company->name }}"
                                        class="w-20 h-20 mx-auto object-contain mb-3">
                                @else
                                    <div
                                        class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-building text-blue-600 text-3xl"></i>
                                    </div>
                                @endif
                                <h4 class="font-bold text-gray-800">{{ $vacancy->company->name }}</h4>
                            </div>
                            @if ($vacancy->company->description)
                                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                    {{ Str::limit($vacancy->company->description, 150) }}
                                </p>
                            @endif
                            <a href="{{ route('landing.company-detail', $vacancy->company->slug) }}"
                                class="block w-full bg-gray-100 hover:bg-gray-200 text-center py-2 rounded-lg transition duration-300">
                                Lihat Profil Perusahaan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Jobs -->
    @if ($relatedJobs->count() > 0)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                        Lowongan <span class="text-blue-600">Terkait</span>
                    </h2>

                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($relatedJobs as $job)
                            <x-job-card :vacancy="$job" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-home>
