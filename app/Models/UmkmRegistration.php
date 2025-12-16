<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_umkm',
        'pemilik',
        'email',
        'no_wa',
        'kategori',
        'deskripsi',
        'stand_number',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
