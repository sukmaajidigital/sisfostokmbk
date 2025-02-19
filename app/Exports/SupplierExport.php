<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;

class SupplierExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $suppliers;

    public function __construct($suppliers)
    {
        $this->suppliers = $suppliers;
    }

    public function collection()
    {
        return $this->suppliers;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Supplier',
            'Nomor Telepon',
            'Alamat',
        ];
    }

    public function map($supplier): array
    {
        return [
            $supplier->id,
            $supplier->nama_supplier,
            $supplier->nomor,
            $supplier->alamat,
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
