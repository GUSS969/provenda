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
        'id_admin',
    ];

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
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
}
