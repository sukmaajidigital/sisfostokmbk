<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Kategori
        $kategoris = [
            'kain',
            'warna',
            'Kimia',
            'lainya'
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategoris')->insert([
                'nama_kategori' => $kategori,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
