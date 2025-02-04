<!-- resources/views/components/navigation.blade.php -->
<div class="bg-gray-800 text-white p-4">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="flex space-x-4">
            <!-- Ссылка на Дашборд -->
            <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 px-4 py-2 rounded-md">Дашборд</a>

            <!-- Ссылка на профиль -->
            <a href="{{ route('profile') }}" class="hover:bg-gray-700 px-4 py-2 rounded-md">Профиль</a>
        </div>

        <!-- Выйти из системы -->
        <div>
            @if (auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 px-4 py-2 rounded-md">
                        Выйти
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
