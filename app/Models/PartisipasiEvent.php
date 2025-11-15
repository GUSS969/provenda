<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartisipasiEvent extends Model
{
    protected $fillable = [
        'event_id',
        'ip_address',
        'status',
        'tanggal_partisipasi',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
