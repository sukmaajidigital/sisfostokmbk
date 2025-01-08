<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;

class BahanKeluarExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $bahankeluars;

    public function __construct($bahankeluars)
    {
        $this->bahankeluars = $bahankeluars;
    }

    public function collection()
    {
        return $this->bahankeluars;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Tanggal',
            'Jumlah',
            'Nama Bahan',
            'Kategori Bahan',
            'Catatan',
            'Keperluan'
        ];
    }

    public function map($bahankeluar): array
    {
        return [
            $bahankeluar->id,
            $bahankeluar->tanggal,
            $bahankeluar->jumlah,
            $bahankeluar->bahan->nama_bahan,
            $bahankeluar->bahan->kategori->nama_kategori,
            $bahankeluar->catatan,
            $bahankeluar->keperluan->nama_keperluan
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Apply styles (optional)
        return [
            1 => ['font' => ['bold' => true]], // Set headings (row 1) to bold
        ];
    }
}
