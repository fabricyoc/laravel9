<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'matricula' => $this->faker->randomNumber(9, true), // 2017 1 01 01 - ano_ingresso modalidade turma sequencia_aluno
            'nome' => fake()->name(),
            'senha' => '123',
            'dataNasc' => fake()->date(),
            'sexo' => $this->faker->randomElement(['m', 'f', 'n']), // masculino, feminino, não informado
        ];
    }
}
