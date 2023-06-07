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
        $quiz = Quiz::findOrFail($id);
        $questions = Question::with('choices')->where('quiz_id', $id)->get();

        return view('quiz.show', [
            'quiz' => $quiz,
            'questions' => $questions,
        ]);
    }
}
