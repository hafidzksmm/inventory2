<?php

namespace App\Exports;

use App\Models\ws;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoriExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data dari tabel inventaris (model ws)
     */
    public function collection()
    {
        return ws::select(
            'nama_barang',
            'merk',
            'deskripsi',
            'dimensi',
            'qty',
            'satuan',
            'lokasi'
        )->get();
    }

    /**
     * Buat header kolom untuk file Excel
     */
    public function headings(): array
    {
        return [
            'Nama Barang',
            'Merk',
            'Deskripsi',
            'Dimensi',
            'Qty',
            'Satuan',
            'Lokasi',
        ];
    }
}
