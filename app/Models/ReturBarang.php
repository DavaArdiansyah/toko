<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    use HasFactory;

    protected $table = 'retur_barang'; // Ensure the table name is correct
    protected $primaryKey = 'kode_retur_barang';
    public $incrementing = false; // Set to false because primary key is not auto-incrementing
    protected $keyType = 'string'; // Set the key type to string

    protected $fillable = [
        'kode_retur_barang',
        'kode_barang',
        'stok',
        'nama_supplier',
        'tanggal',
        'kode_user',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user');
    }
}
