{{-- <!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ編集画面</title>
    @vite('resources/css/app.css')
</head>
<body>
  <form method="post" action="{{ route('quizzes.update', $quiz->id) }}" class="w-full max-w-sm mx-auto mt-6">
    @method('PUT')
    @csrf
    <div class="flex flex-wrap mb-6">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">クイズ名:</label>
        <input type="text" id="name" name="name" value="{{ $quiz->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
    </div>
    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">更新</button>
  </form>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ編集画面</title>
    @vite('resources/css/app.css')
</head>
<body>
  <form method="post" action="{{ route('quizzes.update', $quiz->id) }}" class="w-full max-w-sm mx-auto mt-6">
    @method('PUT')
    @csrf
    <div class="flex flex-wrap mb-6">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">クイズ名:</label>
        <input type="text" id="name" name="name" value="{{ $quiz->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
    </div>

    @foreach($quiz->questions as $question)
    <div class="flex flex-wrap mb-6">
        <label for="questions[{{ $question->id }}]" class="block text-gray-700 text-sm font-bold mb-2">問題{{ $question->id }}</label>
        <input type="text" id="questions[{{ $question->id }}]" name="questions[{{ $question->id }}]" value="{{ $question->text }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        
        @foreach($question->choices as $choice)
        <label for="choices[{{ $choice->id }}]" class="block text-gray-700 text-sm font-bold mb-2">選択肢:</label>
        <input type="text" id="choices[{{ $choice->id }}]" name="choices[{{ $choice->id }}]" value="{{ $choice->text }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        @endforeach
    </div>
    @endforeach

    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">更新</button>
  </form>
</body>
</html>
