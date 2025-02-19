<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeperluanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Keperluan
        $keperluans = ['pelatihan', 'produksi', 'pesanan'];

        foreach ($keperluans as $keperluan) {
            DB::table('keperluans')->insert([
                'nama_keperluan' => $keperluan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
