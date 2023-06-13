<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.index', ['quizzes' => $quizzes]);
    }

    public function show($id)
    {
        // eagerロード(withメソッドで実装可能)
        // 指定されたidのクイズを取得し、そのクイズに紐づく設問と選択肢を取得する
        // $quizをviewに渡す
        $quiz = Quiz::with('questions.choices')->find($id);

        if ($quiz === null) {
            abort(404);
        }

        return view('quiz.show', ['quiz' => $quiz]);
    }
}
