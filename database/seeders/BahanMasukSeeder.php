<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahans = DB::table('bahans')->get();

        foreach ($bahans as $bahan) {
            $idSupplier = ($bahan->id_kategori == DB::table('kategoris')->where('nama_kategori', 'kain')->value('id')) ? 2 : 1;

            DB::table('bahan_masuks')->insert([
                'tanggal' => now(),
                'jumlah' => $bahan->stok,
                'id_bahan' => $bahan->id,
                'id_supplier' => $idSupplier,
                'catatan' => 'Input stok awal',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
