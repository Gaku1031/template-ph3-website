<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choices')->insert([
            [
                'id' => 1,
                'question_id' => 1,
                'text' => 'こうわ',
                'is_correct' => false,
            ],
            [
                'id' => 2,
                'question_id' => 1,
                'text' => 'たかわ',
                'is_correct' => false,
            ],
            [
                'id' => 3,
                'question_id' => 1,
                'text' => 'たかなわ',
                'is_correct' => true,
            ],
            [
                'id' => 4,
                'question_id' => 2,
                'text' => 'かめいど',
                'is_correct' => true,
            ],
            [
                'id' => 5,
                'question_id' => 2,
                'text' => 'かめど',
                'is_correct' => false,
            ],
            [
                'id' => 6,
                'question_id' => 2,
                'text' => 'かめと',
                'is_correct' => false,
            ],
            [
                'id' => 7,
                'question_id' => 3,
                'text' => 'かゆまち',
                'is_correct' => false,
            ],
            [
                'id' => 8,
                'question_id' => 3,
                'text' => 'おかとまち',
                'is_correct' => false,
            ],
            [
                'id' => 9,
                'question_id' => 3,
                'text' => 'こうじまち',
                'is_correct' => true,
            ],

        ]);
    }
}
