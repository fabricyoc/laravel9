<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author' => $this->faker->name,
            'title' => fake()->text(20),
            'subject' => fake()->text(30),
            'dateAcquisition' => $this->faker->date,
            // 'totBooks' => $this->faker->randomDigit,
            'totBooks' => fake()->randomDigit(),
        ];
    }
}
