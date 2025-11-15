<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'alamat',
        'kontak',
        'username',
        'password',
        'status',
        'admin_id',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
