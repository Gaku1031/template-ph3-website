<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'text' => 'この地名はなんて読む？：高輪',
                'quiz_id' => 1,
            ],
            [
                'id' => 2,
                'text' => 'この地名はなんて読む？：亀戸',
                'quiz_id' => 1,
            ],
            [
                'id' => 3,
                'text' => 'この地名はなんて読む？：麹町',
                'quiz_id' => 1,
            ],

        ]);
    }
}
