<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->word(),
            'imagem' => fake()->imageUrl(),
            'preco' => fake()->randomFloat(2, 15, 100), // casas decimais, valor mín, máx
            'descricao' => fake()->sentence(),
            'estoque' => fake()->randomDigit(),
        ];
    }
}
