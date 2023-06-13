<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ一覧</title>
    @vite('resources/css/app.css')
</head>
{{-- <body class="bg-gray-200">
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
</body> --}}

<body class="bg-gray-100">
    <h1 class="font-bold text-3xl text-center mt-5">クイズ一覧</h1>
    <div class="container mx-auto py-10">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">クイズ名</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">編集</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">詳細</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">削除</th>
                                </tr>
                            </thead>
                            @foreach($quizzes as $quiz)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quiz.show', $quiz->id) }}" class="text-2xl font-bold">{{ $quiz->name }}</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><button class="px-2 py-1 text-green-500 border border-green-500 font-semibold rounded hover:bg-green-100">編集</button></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quiz.show', $quiz->id) }}"><button class="px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100">詳細</button></a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><button class="px-2 py-1 text-red-500 border border-red-500 font-semibold rounded hover:bg-red-100">削除</button></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="w-full text-center z-10 mb-10">
            <button class="w-40 h-16 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="./agent-form.php">新規登録</a></button>
        </div>
    </footer>
</body>
</html>
