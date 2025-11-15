<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'no_hp',
        'alamat',
        'status',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
