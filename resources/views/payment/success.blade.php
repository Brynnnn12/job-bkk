<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembayaran Berhasil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <!-- Success Icon -->
                    <div class="mb-6">
                        <i class="fas fa-check-circle text-green-500 text-6xl"></i>
                    </div>

                    <!-- Success Message -->
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Pembayaran Berhasil!</h1>
                    <p class="text-gray-600 mb-8">Terima kasih! Pembayaran untuk lamaran pekerjaan Anda telah berhasil
                        diproses.</p>

                    <!-- Payment Details -->
                    <div class="bg-gray-50 p-6 rounded-lg mb-8 text-left">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Detail Pembayaran</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">ID Pembayaran</p>
                                <p class="font-semibold">#{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Posisi</p>
                                <p class="font-semibold">{{ $payment->jobRegistration->vacancy->title }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Perusahaan</p>
                                <p class="font-semibold">{{ $payment->jobRegistration->vacancy->company->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Jumlah Dibayar</p>
                                <p class="font-semibold text-green-600">Rp
                                    {{ number_format($payment->amount, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Metode Pembayaran</p>
                                <p class="font-semibold">{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Status</p>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    @if ($payment->payment_method === 'tunai')
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-6 mb-6">
                            <h3 class="font-semibold text-orange-800 mb-2">
                                <i class="fas fa-info-circle mr-2"></i>Informasi Pembayaran Tunai
                            </h3>
                            <div class="text-orange-700 text-sm text-left">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li><strong>Silakan datang ke kantor untuk menyelesaikan pembayaran tunai</strong>
                                    </li>
                                    <li>Bawa ID Pembayaran:
                                        <strong>#{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</strong></li>
                                    <li>Alamat: Jl. Contoh No. 123, Jakarta</li>
                                    <li>Jam Operasional: Senin-Jumat 08:00-17:00, Sabtu 08:00-12:00</li>
                                    <li>Hubungi: (021) 1234-5678 untuk informasi lebih lanjut</li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                        <h3 class="font-semibold text-blue-800 mb-2">Langkah Selanjutnya</h3>
                        <div class="text-blue-700 text-sm text-left">
                            <ul class="list-disc pl-5 space-y-1">
                                @if ($payment->payment_method === 'tunai')
                                    <li><strong>Selesaikan pembayaran tunai di kantor dalam 3x24 jam</strong></li>
                                @endif
                                <li>Lamaran Anda telah berhasil dikirimkan ke perusahaan</li>
                                <li>Tim HR akan meninjau lamaran Anda dalam 2-5 hari kerja</li>
                                <li>Kami akan mengirimkan notifikasi melalui email untuk update status lamaran</li>
                                <li>Anda dapat memantau status lamaran di menu "Riwayat Lamaran"</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-home mr-2"></i>
                            Kembali ke Dashboard
                        </a>

                        <a href="{{ route('dashboard.applications') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-list mr-2"></i>
                            Lihat Riwayat Lamaran
                        </a>

                        <a href="{{ route('landing.jobs') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-search mr-2"></i>
                            Cari Lowongan Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
