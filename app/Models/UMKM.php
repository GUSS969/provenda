<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class UMKM extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'umkms';

    protected $fillable = [
        'nama_umkm',
        'nama_pemilik',
        'alamat',
        'no_hp',
        'email',
        'password',
        'status',
        'admin_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    // generate UUID otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relasi ke produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    // Relasi ke admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
