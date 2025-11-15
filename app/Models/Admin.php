<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
    ];

    public function penyelenggaras()
    {
        return $this->hasMany(Penyelenggara::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id_admin');
    }
}
