<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'nama_umkm',
        'pemilik',
        'email',
        'no_wa',
        'kategori',
        'deskripsi'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}