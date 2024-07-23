<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kode_obat' => fake()->unique()->randomNumber(6),
            'nama_obat'=> fake()->word(),
            'stok' => fake(),
            'harga' => fake(),
            'id_kategori' => mt_rand(1, 2)
        ];
    }
}
