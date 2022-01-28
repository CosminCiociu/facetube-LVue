<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Videos') }}
        </h2> -->
    </x-slot>

    <div class="py-12 color-gray-custom">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="color-gray-custom overflow-hidden ">
                <div class="p-6 color-gray-custom border-gray-200">
                    <router-view />
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
