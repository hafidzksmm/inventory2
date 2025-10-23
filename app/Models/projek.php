<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class projek extends Model
{
    use HasFactory;

    
    protected $table = 'inventaryprojek';

    protected $fillable = [
        'nama_barang',
        'jenis',
        'tipe',
        'merk',
        'ukuran',
        'jumlah',
        'lokasi',
    ];

    public $timestamps = true;
}