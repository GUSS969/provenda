<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events'; // <-- WAJIB agar tidak bentrok

    protected $fillable = [
        'nama_event',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'deskripsi',
        'kategori_event',
        'status',
        'poster',
        'penyelenggara_id',
    
    ];

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class);
    }


    public function interaksi()
    {
        return $this->hasMany(InteraksiEvent::class);
    }

    public function statistik()
    {
        return $this->hasMany(StatistikPromosi::class);
    }

    public function partisipasi()
    {
        return $this->hasMany(PartisipasiEvent::class);
    }

    // 🔥 Relasi ini tetap bisa digunakan jika tabel `umkm_registrations` ada dan berisi `event_id`
    public function umkmRegistrations()
    {
        return $this->hasMany(UmkmRegistration::class);
    }
}