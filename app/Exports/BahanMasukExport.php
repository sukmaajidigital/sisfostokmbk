<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BahanMasukExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $bahanmasuks;

    public function __construct($bahanmasuks)
    {
        $this->bahanmasuks = $bahanmasuks;
    }

    public function collection()
    {
        return $this->bahanmasuks;
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
            'Supplier'
        ];
    }

    public function map($bahanmasuk): array
    {
        return [
            $bahanmasuk->id,
            $bahanmasuk->tanggal,
            $bahanmasuk->jumlah,
            $bahanmasuk->bahan->nama_bahan,
            $bahanmasuk->bahan->kategori->nama_kategori,
            $bahanmasuk->catatan,
            $bahanmasuk->supplier->nama_supplier
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Optionally, apply styles here
        return [
            // Example: Set bold for headings
            1 => ['font' => ['bold' => true]],
        ];
    }
}
