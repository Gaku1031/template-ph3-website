<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz - {{ $quiz->name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<div class="container mx-auto px-4">
    <h1 class="text-3xl mt-10 text-center">{{ $quiz->name }}</h1>
    @foreach($questions as $question)
        <div class="bg-white rounded-lg shadow-md p-6 mt-6 text-center">
            <p class="text-2xl">{{ $question->text }}</p>
            @foreach($question->choices as $choice)
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2" onclick="checkAnswer({{ $choice->is_correct }})">
                    {{ $choice->text }}
                </button>
            @endforeach
        </div>
    @endforeach
</div>

<script>
function checkAnswer(isCorrect) {
    if (isCorrect) {
        alert('正解!');
    } else {
        alert('不正解...');
    }
}
</script>

</body>
</html>
