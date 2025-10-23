<?php

namespace App\Imports;

use App\Models\projek;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new projek([
            'nama_barang' => $row['nama_barang'],
            'jenis'       => $row['jenis'],
            'tipe'        => $row['tipe'],
            'merk'        => $row['merk'],
            'ukuran'      => $row['ukuran'],
            'jumlah'      => $row['jumlah'],
            'lokasi'      => $row['lokasi'],
        ]);
    }
}
