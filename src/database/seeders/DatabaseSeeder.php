<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            QuizSeeder::class,
            QuestionSeeder::class,
            ChoiceSeeder::class,
        ]);

        for ($i = 0; $i < 100; $i++) {
            $quiz = Quiz::factory()->create();

            // 各クイズに対して、質問を6つ作成
            for ($j = 0; $j < 6; $j++) {
                $question = Question::factory()->create(['quiz_id' => $quiz->id]);

                // 各質問に対して、選択肢を3つ作成
                Choice::factory(3)->create(['question_id' => $question->id]);
            }
        }
    }
}
