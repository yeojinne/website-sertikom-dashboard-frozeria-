<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'stok',
        'stok_minimum',
        'satuan',
        'harga_jual',
        'harga_beli',
        'berat',
        'lokasi_simpan',
        'deskripsi',
        'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}