<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBahanKeperluanSeeder extends Seeder
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

        // Seed Bahan berdasarkan kategori
        $bahan = [
            'kain' => [
                'Kain Katun',
                'Kain Katun Doby',
                'Kain Sutra',
            ],
            'warna' => [
                'Remazol Red B',
                'Remazol Black B',
                'Remazol Blue 3R',
                'Remazol Yellow G',
                'Remazol Brown GR',
                'Remazol',
                'Turquoise Blue B',
                'Remazol Yellow FG',
                'Remazol Yellow GR',
                'Remazol Blackn-150',
                'Remazol BR Blue BB',
                'Remazol Black B PDR',
                'Remazol Turquoise P',
                'Remazol BR Red R-2G',
                'Remazol Navy Blue GG',
                'Remazol Brilliant Yellow GL',
                'Remazol Brilliant Green GGL',
                'Rapid dyes (Azo Class)',
                'Warna merah',
                'Indigosol IGK',
                'Indigosol ING',
                'Indigosol Orange',
                'Indigosol violet',
                'Indigosol IBL',
                'Indigosol IB',
                'Indigosol 04B',
                'Indigosol IR',
                'Indigosol IRRD',
                'Naftol ASD',
                'Naftol ASBS',
                'Naftol AS',
                'Naftol ASBO',
                'Naftol 91',
                'Naftol Merah B',
                'Naftol Scarlet',
                'Naftol Hitam B',
                'Naftol Biru B',
                'Naftol Yelow GC',
                'Naftol Yelow GG'
            ],
            'Kimia' => [
                'Waterglass',
                'Soda Abu',
                'Nitrit',
                'Asam Hidroklorat',
                'Tawas',
                'Cuka',
                'Tanjung',
                'Kapur'
            ],
            'lainya' => [
                'Malam',
                'Gondorukem',
                'Damar'
            ]
        ];

        foreach ($bahan as $kategori => $listBahan) {
            $kategoriId = DB::table('kategoris')->where('nama_kategori', $kategori)->value('id');

            foreach ($listBahan as $item) {
                DB::table('bahans')->insert([
                    'nama_bahan' => $item,
                    'satuan' => 'unit', // Sesuaikan satuan sesuai kebutuhan
                    'stok' => 0,
                    'id_kategori' => $kategoriId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Seed Keperluan
        $keperluans = ['pelatihan', 'produksi'];

        foreach ($keperluans as $keperluan) {
            DB::table('keperluans')->insert([
                'nama_keperluan' => $keperluan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
