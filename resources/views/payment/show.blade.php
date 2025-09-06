<x-home>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex">
                        <i class="fas fa-check-circle text-green-400 mr-3 mt-0.5"></i>
                        <div class="text-green-800">{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            @if (session('info'))
                <div class="mb-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <i class="fas fa-info-circle text-blue-400 mr-3 mt-0.5"></i>
                        <div class="text-blue-800">{{ session('info') }}</div>
                    </div>
                </div>
            @endif

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
                    <!-- Payment Info -->
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Pembayaran</h1>

                        <!-- Job Info -->
                        <div class="bg-blue-50 p-6 rounded-lg mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3">Informasi Pekerjaan</h2>
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
                                    <p class="text-sm text-gray-600">Kategori</p>
                                    <p class="font-semibold">{{ $payment->jobRegistration->vacancy->category->name }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Status Lamaran</p>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        {{ ucfirst($payment->jobRegistration->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Details -->
                        <div class="bg-gray-50 p-6 rounded-lg mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3">Rincian Pembayaran</h2>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Biaya Pendaftaran</span>
                                    <span class="font-semibold">Rp
                                        {{ number_format($payment->amount, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Biaya Admin</span>
                                    <span class="font-semibold">Rp 0</span>
                                </div>
                                <hr class="my-2">
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total</span>
                                    <span class="text-blue-600">Rp
                                        {{ number_format($payment->amount, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        @if ($payment->status === 'pending')
                            <!-- Payment Options -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilih Metode Pembayaran</h2>

                                <div class="space-y-4 mb-6">
                                    <div class="flex items-center">
                                        <input id="transfer" name="payment_method" type="radio" value="transfer"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" required>
                                        <label for="transfer" class="ml-3 flex items-center">
                                            <i class="fas fa-university text-blue-600 mr-2"></i>
                                            <div>
                                                <div class="font-medium">Transfer Bank (Midtrans)</div>
                                                <div class="text-sm text-gray-500">ATM, Internet Banking, Mobile Banking
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="tunai" name="payment_method" type="radio" value="tunai"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                        <label for="tunai" class="ml-3 flex items-center">
                                            <i class="fas fa-money-bill-wave text-green-600 mr-2"></i>
                                            <div>
                                                <div class="font-medium">Pembayaran Tunai</div>
                                                <div class="text-sm text-gray-500">Bayar langsung di kantor</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <a href="{{ route('dashboard') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg transition duration-300">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Kembali
                                    </a>

                                    <button type="button" id="paymentButton"
                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                                        <i class="fas fa-credit-card mr-2"></i>
                                        Lanjutkan Pembayaran
                                    </button>
                                </div>
                            </div>

                            {{-- Midtrans Snap JS --}}
                            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
                            </script>

                            <script>
                                document.getElementById('paymentButton').addEventListener('click', function(e) {
                                    const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;

                                    if (selectedMethod === 'transfer') {
                                        // Jalankan Snap Midtrans
                                        payNow("{{ $payment->snap_token }}");
                                    } else if (selectedMethod === 'tunai') {
                                        const confirmation = confirm(
                                            'Dengan memilih pembayaran tunai, Anda setuju untuk datang langsung ke kantor untuk menyelesaikan pembayaran. Lanjutkan?'
                                        );
                                        if (confirmation) {
                                            window.location.href = "{{ route('payment.check-status', $payment) }}";
                                        }
                                    }
                                });

                                function payNow(snapToken) {
                                    snap.pay(snapToken, {
                                        onSuccess: function(result) {
                                            console.log('Payment success:', result);
                                            window.location.href = "{{ route('payment.check-status', $payment) }}";
                                        },
                                        onPending: function(result) {
                                            console.log('Payment pending:', result);
                                            window.location.href = "{{ route('payment.check-status', $payment) }}";
                                        },
                                        onError: function(result) {
                                            console.log('Payment error:', result);
                                            window.location.href = "{{ route('payment.error', $payment) }}";
                                        },
                                        onClose: function() {
                                            console.log('Payment popup closed');
                                            setTimeout(() => {
                                                window.location.href = "{{ route('payment.check-status', $payment) }}";
                                            }, 2000);
                                        }
                                    });
                                }
                            </script>
                        @else
                            <!-- Payment Status -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6 text-center">
                                @if ($payment->status === 'completed')
                                    <i class="fas fa-check-circle text-green-500 text-4xl mb-4"></i>
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran Berhasil!</h2>
                                    <p class="text-gray-600 mb-4">Terima kasih, pembayaran Anda telah dikonfirmasi.</p>
                                @elseif($payment->status === 'processing')
                                    <i class="fas fa-clock text-yellow-500 text-4xl mb-4"></i>
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran Sedang Diproses</h2>
                                    <p class="text-gray-600 mb-4">Pembayaran Anda sedang dalam proses verifikasi.</p>
                                @elseif($payment->status === 'failed')
                                    <i class="fas fa-times-circle text-red-500 text-4xl mb-4"></i>
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran Gagal!</h2>
                                    <p class="text-gray-600 mb-4">Silakan coba lagi atau gunakan metode lain.</p>
                                @endif

                                <a href="{{ route('dashboard') }}"
                                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                                    <i class="fas fa-home mr-2"></i>
                                    Kembali ke Dashboard
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</x-home>
