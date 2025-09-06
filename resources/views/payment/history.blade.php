<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-credit-card text-white"></i>
            </div>
            <span>Riwayat Pembayaran</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Riwayat Pembayaran</h1>
                    </div>

                    @if ($payments->count() > 0)
                        <div class="space-y-4">
                            @foreach ($payments as $payment)
                                <div
                                    class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-300">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <h3 class="text-lg font-semibold text-gray-800 mr-3">
                                                    {{ $payment->jobRegistration->vacancy->title }}
                                                </h3>
                                                @if ($payment->status === 'completed')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-1"></i> Selesai
                                                    </span>
                                                @elseif($payment->status === 'processing')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        <i class="fas fa-clock mr-1"></i> Diproses
                                                    </span>
                                                @elseif($payment->status === 'pending')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-exclamation-triangle mr-1"></i> Menunggu
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="grid md:grid-cols-4 gap-4 text-sm text-gray-600">
                                                <div>
                                                    <p class="font-medium">Perusahaan</p>
                                                    <p>{{ $payment->jobRegistration->vacancy->company->name }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Kategori</p>
                                                    <p>{{ $payment->jobRegistration->vacancy->category->name }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Jumlah</p>
                                                    <p class="font-semibold text-blue-600">Rp
                                                        {{ number_format($payment->amount, 0, ',', '.') }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-medium">Metode Pembayaran</p>
                                                    <p>{{ $payment->payment_method ? ucfirst(str_replace('_', ' ', $payment->payment_method)) : '-' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right ml-4">
                                            <p class="text-sm text-gray-500 mb-1">ID:
                                                #{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ $payment->created_at->format('d M Y H:i') }}</p>

                                            @if ($payment->status === 'pending')
                                                <a href="{{ route('payment.show', $payment->id) }}"
                                                    class="inline-flex items-center mt-2 px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium transition duration-300">
                                                    <i class="fas fa-credit-card mr-1"></i>
                                                    Bayar Sekarang
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $payments->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-receipt text-gray-300 text-6xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-700 mb-2">Belum Ada Riwayat Pembayaran</h3>
                            <p class="text-gray-500 mb-6">Anda belum memiliki riwayat pembayaran untuk lamaran
                                pekerjaan.</p>
                            <a href="{{ route('landing.jobs') }}"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition duration-300">
                                <i class="fas fa-search mr-2"></i>
                                Cari Lowongan Pekerjaan
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
