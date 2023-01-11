<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $nome = fake()->word();
        return [
            'nome' => $nome,
            'slug' => Str::slug($nome),
            'imagem' => fake()->imageUrl(),
            'preco' => fake()->randomFloat(2, 15, 100), // casas decimais, valor mín, máx
            'descricao' => fake()->sentence(),
            'estoque' => fake()->randomDigit(),
        ];
    }
}
