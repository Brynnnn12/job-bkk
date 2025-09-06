@props(['vacancy'])

<div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 p-6">
    <div class="flex items-start justify-between mb-4">
        <div class="flex-1">
            <h3 class="font-bold text-xl text-gray-800 mb-2 leading-tight">
                <a href="{{ route('landing.job-detail', $vacancy->id) }}" class="hover:text-blue-600 transition">
                    {{ $vacancy->title }}
                </a>
            </h3>
            <div class="flex items-center text-gray-600 mb-2">
                <i class="fas fa-building mr-2 text-blue-500"></i>
                <a href="{{ route('landing.company-detail', $vacancy->company->slug) }}"
                    class="hover:text-blue-600 transition">
                    {{ $vacancy->company->name }}
                </a>
            </div>
            <div class="flex items-center text-gray-600 mb-3">
                <i class="fas fa-tag mr-2 text-green-500"></i>
                <span class="bg-gray-100 px-2 py-1 rounded-full text-sm">{{ $vacancy->category->name }}</span>
            </div>
        </div>
    </div>

    <div class="border-t pt-4">
        <div class="flex items-center justify-between">
            <div class="text-blue-600 font-bold text-lg">
                @if ($vacancy->fee)
                    Rp {{ number_format($vacancy->fee, 0, ',', '.') }}
                @else
                    Negotiable
                @endif
            </div>
            <div class="text-gray-500 text-sm">
                {{ $vacancy->created_at->diffForHumans() }}
            </div>
        </div>
        <a href="{{ route('landing.job-detail', $vacancy->id) }}"
            class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition duration-300 mt-4">
            Lihat Detail
        </a>
    </div>
</div>
