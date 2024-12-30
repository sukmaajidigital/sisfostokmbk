<?php

namespace App\Exports;

use App\Models\Bahan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BahanExport implements FromArray, WithTitle, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $kategori;
    protected $satuan;

    public function __construct($kategori, $satuan)
    {
        $this->kategori = $kategori;
        $this->satuan = $satuan;
    }

    public function array(): array
    {
        $query = Bahan::with('kategori:id,nama_kategori')
            ->select('id', 'nama_bahan', 'stok', 'satuan', 'id_kategori');

        if ($this->kategori) {
            $query->where('id_kategori', $this->kategori);
        }

        if ($this->satuan) {
            $query->where('satuan', $this->satuan);
        }

        $data = $query->get();

        $result = [];
        foreach ($data as $bahan) {
            $result[] = [
                'id' => $bahan->id,
                'nama_bahan' => $bahan->nama_bahan,
                'stok' => $bahan->stok,
                'satuan' => $bahan->satuan,
                'kategori' => $bahan->kategori->nama_kategori ?? '-',
            ];
        }

        return $result;
    }

    public function title(): string
    {
        return 'Data Bahan';
    }

    public function headings(): array
    {
        return [
            ['Data Bahan'], // Judul
            ['Exported on: ' . now()->format('Y-m-d H:i:s')], // Informasi tanggal ekspor
            [], // Baris kosong untuk estetika
            ['ID', 'Nama Bahan', 'Stok', 'Satuan', 'Kategori'], // Header kolom
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]], // Judul besar
            2 => ['font' => ['italic' => true]], // Tanggal ekspor
            4 => ['font' => ['bold' => true]], // Header kolom
        ];
    }
}
