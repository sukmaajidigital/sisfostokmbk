<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanMasuks = DB::table('bahan_masuks')->get();

        foreach ($bahanMasuks as $bahanMasuk) {
            // Mengurangi jumlah bahan masuk agar sesuai dengan kebutuhan aplikasi
            $jumlahKeluar = $bahanMasuk->jumlah - 10; // Misalnya, keluar 10 kurang dari stok masuk

            // Pastikan jumlah keluar tidak kurang dari nol
            if ($jumlahKeluar > 0) {
                DB::table('bahan_keluars')->insert([
                    'tanggal' => now(),
                    'jumlah' => $jumlahKeluar,
                    'id_bahan' => $bahanMasuk->id_bahan,
                    'id_keperluan' => DB::table('keperluans')->inRandomOrder()->value('id'), // Ambil id_keperluan secara acak
                    'catatan' => 'Pengeluaran bahan awal',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Update stok di bahan masuk agar konsisten
                DB::table('bahan_masuks')->where('id', $bahanMasuk->id)->update([
                    'jumlah' => 10, // Stok setelah dikurangi
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
