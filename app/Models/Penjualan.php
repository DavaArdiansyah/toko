<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'nomor_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_transaksi',
        'tanggal',
        'total_harga',
        'diskon',
        'total_bayar',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
