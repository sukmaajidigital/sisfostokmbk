<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'nama_supplier' => 'Toko Obat Batik Santoso',
                'nomor' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 45, Surakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Kain Haji Ann',
                'nomor' => '082345678901',
                'alamat' => 'Jl. Raya Kebayoran No. 12, Pekalongan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
