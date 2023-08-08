<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-around md:justify-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(auth()->user()->status == 'free')
                <button disabled class="mx-3">フリー</button>
            @else
                <a href="{{ route('setfree') }}">
                    <x-primary-button class="mx-3">
                        フリー
                    </x-primary-button>
                </a>
            @endif
            @if(auth()->user()->status == 'busy')
                <button disabled class="mx-3">対応中</button>
            @else
                <a href="{{ route('setbusy') }}">
                    <x-primary-button class="mx-3">
                        対応中
                    </x-primary-button>
                </a>
            @endif
            @if(auth()->user()->status == 'vip')
                <button disabled class="mx-3">VIP</button>
            @else
                <a href="{{ route('setvip') }}">
                    <x-primary-button class="mx-3">
                        {{ __('VIP') }}
                    </x-primary-button>
                </a>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="app"></div>
                    @vite(['resources/js/main.js'])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
