<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPromosi extends Model
{
    protected $fillable = [
        'event_id',
        'total_view',
        'total_like',
        'periode',
        'tanggal_diperbarui',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
