<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'tanggal_event',
        'lokasi',
        'kategori',
        'deskripsi',
        'poster',
        'penyelenggara_id',
        'open_registration',      // Tambahan baru
        'max_participants',       // Tambahan baru
        'registration_info',      // Tambahan baru
    ];

    protected $casts = [
        'open_registration' => 'boolean',
        'tanggal_event' => 'date',
    ];

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'penyelenggara_id');
    }

    public function umkmRegistrations()
    {
        return $this->hasMany(UmkmRegistration::class, 'event_id');
    }
    
    // Helper method: Cek apakah pendaftaran masih dibuka
    public function isRegistrationOpen()
    {
        if (!$this->open_registration) {
            return false;
        }
        
        // Cek apakah sudah penuh
        if ($this->max_participants) {
            $currentCount = $this->umkmRegistrations()->count();
            if ($currentCount >= $this->max_participants) {
                return false;
            }
        }
        
        return true;
    }
    
    // Helper method: Hitung sisa kuota
    public function remainingSlots()
    {
        if (!$this->max_participants) {
            return null; // Unlimited
        }
        
        $currentCount = $this->umkmRegistrations()->count();
        return max(0, $this->max_participants - $currentCount);
    }
}