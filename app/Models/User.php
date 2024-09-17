<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'kode_user'; // Tentukan kolom kunci utama
    public $incrementing = false; // Pastikan tidak auto-increment
    protected $keyType = 'string'; // Tentukan tipe kunci utama

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($Model) {
            $prefix = 'USR'; // Prefix for user codes
            $lastRecord = self::orderBy('kode_user', 'desc')->first();

            // Fix the number extraction from 'kode_user'
            $lastNumber = $lastRecord ? intval(substr($lastRecord->kode_user, strlen($prefix))) : 0;
            $newNumber = $lastNumber + 1;

            // Generate new 'kode_user' and ensure it's padded to at least 2 digits
            $Model->kode_user = $prefix . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        });
    }

    // Relasi ke tabel Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'kode_user', 'kode_user');
    }

    // Relasi ke tabel BarangMasuk
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'kode_user', 'kode_user');
    }
}
