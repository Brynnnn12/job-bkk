<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen bg-gray-50">
        @include('layouts.navigation')

        <!-- Main content area -->
        <div class="lg:ml-64 pt-16 lg:pt-0">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm border-b border-gray-200 sticky top-16 lg:top-0 z-20">
                    <div class="px-4 py-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ $header }}
                            </h2>
                            <div class="text-sm text-gray-500 hidden sm:block">
                                {{ now()->format('l, d F Y') }}
                            </div>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="min-h-screen pb-20 lg:pb-6">
                <div class="py-4 lg:py-6">
                    <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-check-circle text-green-400"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-green-800">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Error Message -->
                        @if (session('error'))
                            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-circle text-red-400"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-red-800">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Info Message -->
                        @if (session('info'))
                            <div class="mb-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-info-circle text-blue-400"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-blue-800">{{ session('info') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{ $slot }}
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200">
                <div class="py-4 px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-sm text-gray-500">
                        <p>&copy; {{ date('Y') }} Job Portal BKK. Semua hak dilindungi.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
