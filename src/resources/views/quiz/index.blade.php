<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ一覧</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<div class="container mx-auto px-4">
    <h1 class="text-3xl mt-10 text-center">クイズ一覧</h1>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-6">
        @foreach($quizzes as $quiz)
            <div class="bg-white rounded-lg shadow-md p-6">
                <a href="{{ route('quiz.show', $quiz->id) }}" class="text-2xl font-bold">{{ $quiz->name }}</a>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
