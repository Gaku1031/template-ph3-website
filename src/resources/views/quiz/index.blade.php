<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クイズ一覧</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('/js/common.js') }}" defer></script>
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
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">復元</th>
                                </tr>
                            </thead>
                            @foreach($quizzes as $quiz)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="{{ $quiz->trashed() ? 'text-gray-300' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.show', $quiz->id) }}" class="text-2xl font-bold">{{ $quiz->name }}</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.edit', $quiz->id) }}"><button class="px-2 py-1 text-green-500 border border-green-500 font-semibold rounded hover:bg-green-100">編集</button></a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><a href="{{ route('quizzes.show', $quiz->id) }}"><button class="px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100">詳細</button></a></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center"><button data-modal-target="popup-modal-{{ $quiz->id }}" data-modal-toggle="popup-modal-{{ $quiz->id }}" class="px-2 py-1 text-red-500 border border-red-500 font-semibold rounded hover:bg-red-100" type="button">削除</button></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if($quiz->deleted_at)
                                        <a href="{{ route('quizzes.restore', $quiz->id) }}"><button class="px-2 py-1 text-green-700 border border-green-700 font-semibold rounded hover:bg-green-100">復元</button></a>
                                        {{-- @else
                                        <a href="{{ route('quizzes.edit', $quiz->id) }}"><button class="px-2 py-1 text-green-700 border border-green-700 font-semibold rounded hover:bg-green-100">編集</button></a> --}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            {{-- modal --}}
                            <div id="popup-modal-{{ $quiz->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full bg-black bg-opacity-50">
                                <div class="relative w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $quiz->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">このクイズを削除しますか？</h3>
                                            {{-- <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                削除
                                            </button> --}}
                                            <div class="flex justify-center">
                                                <form action="{{ route('quizzes.delete', $quiz->id) }}" method="POST" id="delete-form-{{ $quiz->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        削除
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">キャンセル</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal --}}
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $quizzes->links() !!}
</body>

    <footer class="fixed bottom-0 w-full z-50 mb-2">
        <div class="w-full text-center z-10 mb-10">
            <button class="w-40 h-16 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><a href="{{ route('quiz.create.form') }}">新規登録</a></button>
        </div>
    </footer>
</html>
