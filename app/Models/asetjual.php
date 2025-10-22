<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asetjual extends Model
{
    use HasFactory;
    
    
    protected $table = 'asset_jual';

    protected $fillable = [
        'nama_barang',
        'jenis',
        'ukuran',
        'dimensi',
        'qty',
        'satuan',
        'lokasi',
    ];

    public $timestamps = true;
}
