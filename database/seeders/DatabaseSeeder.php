<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Obat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $k1 = Kategori::create([
            'kategoris_obat' => 'Analgesik'
        ]);

        $k2 =Kategori::create([
            'kategoris_obat' => 'Antasida'
        ]);

        // Kategori::factory(10)->create();
        Obat::create([
            'kode_obat' => '001',
            'nama_obat' => 'ibuprofen',
            'stok' => 10,
            'harga' => 20000,
            'id_kategori' => $k1->id
        ]);

        Obat::create([
            'kode_obat' => '002',
            'nama_obat' => 'Mylanta',
            'stok' => 10,
            'harga' => 20000,
            'id_kategori' => $k2->id
        ]);

        // Obat::factory(10)->create();

        User::create([
            'user' => 'user',
            'role' => 'admin',
            'password' => bcrypt('user')
        ]);
    }
}
