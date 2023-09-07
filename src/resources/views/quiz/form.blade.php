<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ作成画面</title>
    @vite('resources/css/app.css')
</head>
<body>
  <form method="post" action="{{ route('quizzes.store') }}" class="w-full max-w-sm mx-auto mt-6" enctype="multipart/form-data">
    @csrf
      <div class="mb-4">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-600">クイズ名</label>
          <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
          @if ($errors->has('name'))
            <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
          @endif
      </div>

      <div class="mb-4">
          <label for="question" class="block mb-2 text-sm font-medium text-gray-600">問題</label>
          <textarea name="question" id="question" rows="4" class="w-full p-2 border rounded"></textarea>
          @if ($errors->has('question'))
            <p class="text-red-500 text-xs italic">{{ $errors->first('question') }}</p>
          @endif
      </div>

      @for ($i = 1; $i <= 3; $i++)
      <div class="mb-4">
          <label for="choice{{ $i }}" class="block mb-2 text-sm font-medium text-gray-600">選択肢{{ $i }}</label>
          <input type="text" name="choices[]" id="choice{{ $i }}" class="w-full p-2 border rounded" required>
          @if ($errors->has('choices.' . ($i-1)))
            <p class="text-red-500 text-xs italic">{{ $errors->first('choices.' . ($i-1)) }}</p>
          @endif
      </div>
      @endfor

      <div class="mb-4">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-600">画像</label>
        <input type="file" name="image" id="image" class="w-full">
        @if ($errors->has('image'))
          <p class="text-red-500 text-xs italic">{{ $errors->first('image') }}</p>
        @endif
      </div>

      <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">登録</button>
  </form>
</body>
</html>
