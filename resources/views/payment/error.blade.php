<x-home>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Alert Messages -->
            @if (session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex">
                        <i class="fas fa-exclamation-circle text-red-400 mr-3 mt-0.5"></i>
                        <div class="text-red-800">{{ session('error') }}</div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Payment Error -->
                    <div class="text-center">
                        <div class="mb-6">
                            <i class="fas fa-times-circle text-red-500 text-6xl mb-4"></i>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Pembayaran Gagal!</h1>
                            <p class="text-gray-600 text-lg mb-6">Maaf, terjadi kesalahan dalam proses pembayaran Anda.
                            </p>
                        </div>

                        <!-- Payment Info -->
                        <div class="bg-gray-50 p-6 rounded-lg mb-6 text-left">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3">Detail Pembayaran</h2>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Posisi</p>
                                    <p class="font-semibold">{{ $payment->jobRegistration->vacancy->title }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Perusahaan</p>
                                    <p class="font-semibold">{{ $payment->jobRegistration->vacancy->company->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total Pembayaran</p>
                                    <p class="font-semibold text-lg text-red-600">Rp
                                        {{ number_format($payment->amount, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Status</p>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Gagal
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Error Information -->
                        <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
                            <h3 class="text-lg font-semibold text-red-800 mb-3">Kemungkinan Penyebab:</h3>
                            <ul class="text-left text-red-700 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-red-500 mr-2 mt-1 text-xs"></i>
                                    Saldo tidak mencukupi
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-red-500 mr-2 mt-1 text-xs"></i>
                                    Koneksi internet terputus
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-red-500 mr-2 mt-1 text-xs"></i>
                                    Kartu/rekening terblokir
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-red-500 mr-2 mt-1 text-xs"></i>
                                    Waktu pembayaran telah habis
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-red-500 mr-2 mt-1 text-xs"></i>
                                    Kesalahan teknis dari penyedia layanan
                                </li>
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="{{ route('payment.show', $payment) }}"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                                <i class="fas fa-redo mr-2"></i>
                                Coba Lagi
                            </a>

                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition duration-300">
                                <i class="fas fa-home mr-2"></i>
                                Kembali ke Dashboard
                            </a>
                        </div>

                        <!-- Help Section -->
                        <div class="mt-8 p-6 bg-blue-50 border border-blue-200 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-800 mb-2">Butuh Bantuan?</h3>
                            <p class="text-blue-700 mb-4">Jika masalah terus berlanjut, hubungi tim support kami:</p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="mailto:support@example.com"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-300">
                                    <i class="fas fa-envelope mr-2"></i>
                                    Email Support
                                </a>
                                <a href="tel:+621234567890"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition duration-300">
                                    <i class="fas fa-phone mr-2"></i>
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-home>
