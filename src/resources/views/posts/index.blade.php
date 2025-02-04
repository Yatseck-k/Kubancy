<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все посты</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Все посты</h1>

    @foreach($posts as $post)
        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small class="text-gray-500">Опубликовано: {{ $post->created_at }} | Автор: {{ $post->user->name }}</small>
        </div>
    @endforeach
</div>
</body>
</html>
