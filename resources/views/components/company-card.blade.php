@props(['company'])

<div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-md transition duration-300 group">
    <div class="mb-4">
        @if ($company->logo)
            <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}"
                class="w-16 h-16 mx-auto object-contain">
        @else
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                <i class="fas fa-building text-blue-600 text-2xl"></i>
            </div>
        @endif
    </div>
    <h4 class="font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition">
        <a href="{{ route('landing.company-detail', $company->slug) }}">
            {{ $company->name }}
        </a>
    </h4>
    <p class="text-sm text-gray-600">
        {{ $company->vacancies_count }} lowongan
    </p>
</div>
