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
            [
                'id' => 10,
                'question_id' => 4,
                'text' => '東京',
                'is_correct' => true,
            ],
            [
                'id' => 11,
                'question_id' => 4,
                'text' => 'ハワイ',
                'is_correct' => false,
            ],
            [
                'id' => 12,
                'question_id' => 4,
                'text' => 'ロンドン',
                'is_correct' => false,
            ],
            [
                'id' => 13,
                'question_id' => 5,
                'text' => '慶應義塾大学',
                'is_correct' => true,
            ],
            [
                'id' => 14,
                'question_id' => 5,
                'text' => 'ハーバード大学',
                'is_correct' => false,
            ],
            [
                'id' => 15,
                'question_id' => 5,
                'text' => 'トロント大学',
                'is_correct' => false,
            ],
            [
                'id' => 16,
                'question_id' => 6,
                'text' => '猫',
                'is_correct' => false,
            ],
            [
                'id' => 17,
                'question_id' => 6,
                'text' => '犬',
                'is_correct' => true,
            ],
            [
                'id' => 18,
                'question_id' => 6,
                'text' => 'コアラ',
                'is_correct' => false,
            ],
            [
                'id' => 19,
                'question_id' => 7,
                'text' => '約28万人',
                'is_correct' => false,
            ],
            [
                'id' => 20,
                'question_id' => 7,
                'text' => '約79万人',
                'is_correct' => true,
            ],
            [
                'id' => 21,
                'question_id' => 7,
                'text' => '約183万人',
                'is_correct' => false,
            ],
            [
                'id' => 22,
                'question_id' => 8,
                'text' => 'INTECH',
                'is_correct' => false,
            ],
            [
                'id' => 23,
                'question_id' => 8,
                'text' => 'BIZZTECH',
                'is_correct' => false,
            ],
            [
                'id' => 24,
                'question_id' => 8,
                'text' => 'X-TECH',
                'is_correct' => true,
            ],
            [
                'id' => 25,
                'question_id' => 9,
                'text' => 'Internet of Things',
                'is_correct' => true,
            ],
            [
                'id' => 26,
                'question_id' => 9,
                'text' => 'Integrate into Technology',
                'is_correct' => false,
            ],
            [
                'id' => 27,
                'question_id' => 9,
                'text' => 'Information on Tool',
                'is_correct' => false,
            ],
            [
                'id' => 28,
                'question_id' => 10,
                'text' => 'Society 5.0',
                'is_correct' => true,
            ],
            [
                'id' => 29,
                'question_id' => 10,
                'text' => 'CyPhy',
                'is_correct' => false,
            ],
            [
                'id' => 30,
                'question_id' => 10,
                'text' => 'SDGs',
                'is_correct' => false,
            ],
            [
                'id' => 31,
                'question_id' => 11,
                'text' => 'Web3.0',
                'is_correct' => true,
            ],
            [
                'id' => 32,
                'question_id' => 11,
                'text' => 'NFT',
                'is_correct' => false,
            ],
            [
                'id' => 33,
                'question_id' => 11,
                'text' => 'メタバース',
                'is_correct' => false,
            ],
            [
                'id' => 34,
                'question_id' => 12,
                'text' => '約2倍',
                'is_correct' => false,
            ],
            [
                'id' => 35,
                'question_id' => 12,
                'text' => '約5倍',
                'is_correct' => true,
            ],
            [
                'id' => 36,
                'question_id' => 12,
                'text' => '約11倍',
                'is_correct' => false,
            ],

        ]);
    }
}
