<?php

namespace Database\Factories;

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
            'question' => $this->faker->text(),
            'category' => $this->faker->randomElement(['numeric', 'verbal', 'logika']),
            'first_choice' => $this->faker->word(),
            'second_choice' => $this->faker->word(),
            'third_choice' => $this->faker->word(),
            'fourth_choice' => $this->faker->word(),
            'answer' => $this->faker->randomElement(['a', 'b', 'c', 'd']),
        ];
    }
}
