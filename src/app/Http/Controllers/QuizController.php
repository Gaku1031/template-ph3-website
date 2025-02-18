<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;

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

    public function edit($id)
    {
        $quiz = Quiz::with(['questions.choices'])->findOrFail($id);
        // dd($quiz);
        return view('quiz.edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'name' => $request->name,
        ]);

        foreach ($request->questions as $questionId => $questionText) {
            $question = Question::findOrFail($questionId);
            $question->update([
                'text' => $questionText,
            ]);
        }

        foreach ($request->choices as $choiceId => $choiceText) {
            $choice = Choice::findOrFail($choiceId);
            $choice->update([
                'text' => $choiceText,
            ]);
        }
        session()->flash('message', '更新されました！');
        return redirect()->route('quizzes.index');
    }

    public function delete($id)
    {
        Quiz::find($id)->delete();

        return redirect()->route('quizzes.index')->with('message', 'クイズが削除されました。');
    }
}
