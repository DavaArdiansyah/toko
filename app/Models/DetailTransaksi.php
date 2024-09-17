<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'kode_detail_transaksi';
    protected $fillable = [
        'kode_transaksi',
        'kode_barang',
        'jumlah',
        'total_harga'
    ];

    // Relasi ke transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'kode_transaksi', 'kode_transaksi');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
