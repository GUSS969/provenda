<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'umkm_id',
        'nama_produk',
        'deskripsi_produk',
        'harga',
        'stok',
        'gambar_produk',
    ];

    public function umkm()
    {
        return $this->belongsTo(UMKM::class);
    }
}
