<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ты уже кубанец?</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="text-center bg-white p-8 rounded-lg shadow-lg w-96">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Ты уже кубанец?</h1>
    <div class="space-x-4">
        <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">Войти</a>
        <a href="{{ route('register') }}" class="bg-green-500 text-white py-2 px-6 rounded hover:bg-green-600">Регистрация</a>
    </div>
</div>
</body>
</html>
