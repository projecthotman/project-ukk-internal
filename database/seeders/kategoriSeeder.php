<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Seeder;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::create([
            'id' => 1,
            'id_user' => 2,
            'nama' => "Pakaian Pria",
            'gambar' => "1706062537145.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KategoriModel::create([
            'id' => 2,
            'id_user' => 2,
            'nama' => "Aksesoris Fasion",
            'gambar' => "1706062546363.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        KategoriModel::create([
            'id' => 3,
            'id_user' => 2,
            'nama' => "Hobi & Koleksi",
            'gambar' => "1706062557482.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
