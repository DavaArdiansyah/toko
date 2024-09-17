<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_transaksi',
        'total_harga',
        'total_bayar',
        'kembalian',
        'kode_user'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($Model) {
            $prefix = 'TRX'; // Prefix for user codes
            $lastRecord = self::orderBy('kode_transaksi', 'desc')->first();

            // Fix the number extraction from 'kode_transaksi'
            $lastNumber = $lastRecord ? intval(substr($lastRecord->kode_transaksi, strlen($prefix))) : 0;
            $newNumber = $lastNumber + 1;

            // Generate new 'kode_transaksi' and ensure it's padded to at least 2 digits
            $Model->kode_transaksi = $prefix . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        });
    }

    // Relasi ke detail_transaksi
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'kode_transaksi', 'kode_transaksi');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }
}