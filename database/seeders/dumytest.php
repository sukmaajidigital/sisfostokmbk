<?php

namespace Database\Seeders;

use App\Models\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dumytest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 100000; $i++) {
            $data[] = [
                'nama_bahan' => 'Bahan ' . $i,
                'satuan' => ['kg', 'liter', 'pcs', 'meter'][array_rand(['kg', 'liter', 'pcs', 'meter'])],
                'stok' => 100,
                'id_kategori' => rand(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            Bahan::create($data[$i - 1]);
        }
    }
}
