<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ $post->title }}</h3>
                    <p class="text-lg">{{ $post->content }}</p>
                    <p class="mt-4 text-gray-500">Автор: {{ $post->user->name }}</p>
                    <p class="text-gray-500">Создано: {{ $post->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
