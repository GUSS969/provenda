<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InteraksiEvent extends Model
{
    protected $fillable = [
        'event_id',
        'jenis_interaksi',
        'ip_address',
        'user_agent',
        'waktu_interaksi',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
