<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ一覧</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <!-- フラッシュメッセージがある場合に表示 -->
    @if (session('message'))
        <div id="messageBox" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('message') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg id="closeButton" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif

    <script>
        window.onload = function () {
            document.getElementById('closeButton').addEventListener('click', function () {
                document.getElementById('messageBox').style.display = 'none';
            });
        };
    </script>

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
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.show', $quiz->id) }}" class="text-2xl font-bold">{{ $quiz->name }}</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.edit', $quiz->id) }}"><button class="px-2 py-1 text-green-500 border border-green-500 font-semibold rounded hover:bg-green-100">編集</button></a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.show', $quiz->id) }}"><button class="px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100">詳細</button></a></td>
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
