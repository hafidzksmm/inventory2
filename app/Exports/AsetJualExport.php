<?php

namespace App\Exports;

use App\Models\asetjual;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsetJualExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return AsetJual::select('nama_barang', 'jenis','merk','tipe', 'ukuran', 'dimensi', 'qty', 'satuan', 'lokasi')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Barang',
            'Jenis',
            'Merk',
            'Tipe',
            'Ukuran',
            'Dimensi',
            'Qty',
            'Satuan',
            'Lokasi',
        ];
    }
}
