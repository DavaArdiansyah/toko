<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan'; // Pastikan ini cocok dengan nama tabel

    protected $fillable = [
        'kode_pemasukan', 'kode_barang', 'jumlah',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = 'USR'; // Prefix for user codes
            $lastRecord = self::orderBy('kode_pemasukan', 'desc')->first();

            $lastNumber = $lastRecord ? intval(substr($lastRecord->kode_pemasukan, strlen($prefix))) : 0;
            $newNumber = $lastNumber + 1;

            $model->kode_pemasukan = $prefix . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        });
    }

    /**
     * Relasi ke model Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
