<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação específica
        Livro::factory()->create([
            'author' => 'Fabricyo Costa',
            'title' => 'Exterminador II',
            'subject' => 'Ficção',
            'dateAcquisition' => date('Y-m-d'),
            'totBooks' => random_int(1, 30),
        ]);

        // Criação abstrata
        Livro::factory(5)->create();

    }
}
