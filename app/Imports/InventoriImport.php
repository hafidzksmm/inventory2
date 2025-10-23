<?php

namespace App\Imports;

use App\Models\ws;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Pastikan header di file Excel sesuai kolom di database
        return new ws([
            'nama_barang' => $row['nama_barang'] ?? null,
            'merk'        => $row['merk'] ?? null,
            'deskripsi'   => $row['deskripsi'] ?? null,
            'dimensi'     => $row['dimensi'] ?? null,
            'qty'         => $row['qty'] ?? 0,
            'satuan'      => $row['satuan'] ?? null,
            'lokasi'      => $row['lokasi'] ?? null,
        ]);
    }
}
