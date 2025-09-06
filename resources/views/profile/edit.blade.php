<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 shadow-md">
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="Profile Avatar" class="w-full h-full object-cover">
                @else
                    <div
                        class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                        <span class="text-white text-lg font-bold">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                    {{ __('Profile Settings') }}
                </h2>
                <p class="text-gray-600 text-sm">Manage your account information and preferences</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Information Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl mb-8">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Personal Information</h3>
                    <p class="text-blue-100 text-sm">Update your profile details and contact information</p>
                </div>
                <div class="p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Password Update Card -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                    <div class="bg-gradient-to-r from-green-500 to-teal-500 px-6 py-4">
                        <h3 class="text-xl font-semibold text-white">Security</h3>
                        <p class="text-green-100 text-sm">Keep your account secure</p>
                    </div>
                    <div class="p-8">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Card -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 px-6 py-4">
                        <h3 class="text-xl font-semibold text-white">Danger Zone</h3>
                        <p class="text-red-100 text-sm">Permanently delete your account</p>
                    </div>
                    <div class="p-8">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .transition-all {
                transition: all 0.3s ease;
            }

            .hover\:scale-105:hover {
                transform: scale(1.05);
            }

            .shadow-xl {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
        </style>
    @endpush
</x-app-layout>
