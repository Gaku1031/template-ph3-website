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
        $quizzes = Quiz::withTrashed()->paginate(20);
        return view('quiz.index', ['quizzes' => $quizzes]);
    }

    public function restore($id)
    {
        $quiz = Quiz::withTrashed()->find($id);
        $quiz->restore();

        return redirect()->route('quizzes.index')->with('message', 'クイズが復元されました。');
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

    public function createForm()
    {
        return view('quiz.form');
    }

    public function store(Request $request)
    {
        // リクエストのバリデーション
        $request->validate([
            'name' => 'required|string|max:250',
            'question' => 'required|string',
            'choices.*' => 'required|string|max:250',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Quizテーブルへの挿入
        $quiz = Quiz::create(['name' => $request->name]);

        // 画像のアップロード処理
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $imagePath = $request->image->storeAs('images', $imageName, 'public');
        }

        // Questionテーブルへの挿入
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
            'image' => $imagePath
        ]);

        // Choicesテーブルへの挿入
        foreach ($request->choices as $choice) {
            Choice::create([
                'question_id' => $question->id,
                'choice' => $choice
            ]);
        }

        // quiz/index.blade.phpへのリダイレクト
        return redirect()->route('quizzes.index');
    }
}
