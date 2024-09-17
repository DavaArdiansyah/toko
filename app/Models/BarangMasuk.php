<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_barang',
        'stok',
        'nama_supplier',
        'tanggal',
        'kode_user',
    ];

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    // Relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }
}
