<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'text' => $this->faker->sentence,
            'supplement' => $this->faker->sentence,
            'quiz_id' => Quiz::factory(),
        ];
    }
}
