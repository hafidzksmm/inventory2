<?php

namespace App\Exports;

use App\Models\projek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjekExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data dari model Projek
     */
    public function collection()
    {
        return Projek::select('nama_barang', 'jenis', 'tipe', 'merk', 'ukuran', 'jumlah', 'lokasi')->get();
    }

    /**
     * Judul kolom di file Excel
     */
    public function headings(): array
    {
        return [
            'Nama Barang',
            'Jenis',
            'Tipe',
            'Merk',
            'Ukuran',
            'Jumlah',
            'Lokasi',
        ];
    }
}
