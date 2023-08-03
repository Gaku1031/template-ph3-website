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
                // 'id' => 1,
                'image' => '/img/quiz/img-quiz01.png',
                'text' => 'この地名はなんて読む？：高輪',
                'supplement' => '',
                'quiz_id' => 1,
            ],
            [
                // 'id' => 2,
                'image' => '/img/quiz/img-quiz02.png',
                'text' => 'この地名はなんて読む？：亀戸',
                'supplement' => '',
                'quiz_id' => 1,
            ],
            [
                // 'id' => 3,
                'image' => '/img/quiz/img-quiz03.png',
                'text' => 'この地名はなんて読む？：麹町',
                'supplement' => '',
                'quiz_id' => 1,
            ],
            [
                // 'id' => 4,
                'image' => '/img/quiz/img-quiz04.png',
                'text' => '出身地はどこでしょう？',
                'supplement' => '',
                'quiz_id' => 2,
            ],
            [
                // 'id' => 5,
                'image' => '/img/quiz/img-quiz05.png',
                'text' => '在籍中の大学はどこでしょう？',
                'supplement' => '',
                'quiz_id' => 2,
            ],
            [
                // 'id' => 6,
                'image' => '/img/quiz/img-quiz06.png',
                'text' => '動物に例えるとなんと言われることが多いでしょう？',
                'supplement' => '',
                'quiz_id' => 2,
            ],
            [
                // 'id' => 7,
                'image' => '/img/quiz/img-quiz01.png',
                'text' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
                'supplement' => '経済産業省 2019年3月 － IT 人材需給に関する調査',
                'quiz_id' => 3,
            ],
            [
                // 'id' => 8,
                'image' => '/img/quiz/img-quiz02.png',
                'text' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
                'supplement' => '',
                'quiz_id' => 3,
            ],
            [
                // 'id' => 9,
                'image' => '/img/quiz/img-quiz03.png',
                'text' => 'IoTとは何の略でしょう？',
                'supplement' => '',
                'quiz_id' => 3,
            ],
            [
                // 'id' => 10,
                'image' => '/img/quiz/img-quiz04.png',
                'text' => '日本が目指すサイバー空間とフィジカル空間を高度に融合させたシステムによって開かれる未来社会のことをなんというか？',
                'supplement' => 'Society5.0 - 科学技術政策 - 内閣府',
                'quiz_id' => 3,
            ],
            [
                // 'id' => 11,
                'image' => '/img/quiz/img-quiz05.png',
                'text' => 'イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？',
                'supplement' => '',
                'quiz_id' => 3,
            ],
            [
                // 'id' => 12,
                'image' => '/img/quiz/img-quiz06.png',
                'text' => '先進テクノロジー活用企業と出遅れた企業の収益性の差はどれくらいあると言われているでしょうか？',
                'supplement' => 'Accenture Technology Vision 2021',
                'quiz_id' => 3,
            ],
        ]);
    }
}
