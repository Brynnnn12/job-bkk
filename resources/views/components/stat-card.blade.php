@props(['icon', 'count', 'label', 'color'])

@php
    $colorClasses = [
        'blue' => [
            'bg' => 'bg-gradient-to-br from-blue-50 to-blue-100',
            'icon' => 'bg-blue-600',
            'text' => 'text-blue-600',
        ],
        'green' => [
            'bg' => 'bg-gradient-to-br from-green-50 to-green-100',
            'icon' => 'bg-green-600',
            'text' => 'text-green-600',
        ],
        'purple' => [
            'bg' => 'bg-gradient-to-br from-purple-50 to-purple-100',
            'icon' => 'bg-purple-600',
            'text' => 'text-purple-600',
        ],
    ];
    $classes = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="{{ $classes['bg'] }} p-8 rounded-xl">
    <div class="{{ $classes['icon'] }} text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="{{ $icon }} text-2xl"></i>
    </div>
    <h3 class="text-3xl font-bold {{ $classes['text'] }} mb-2">{{ $count }}</h3>
    <p class="text-gray-600 font-medium">{{ $label }}</p>
</div>
