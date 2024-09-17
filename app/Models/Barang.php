<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kode_jenis',
        'harga_beli',
        'harga_jual',
        'stok',
        'diskon',
        'kode_user'
    ];

    // Relationship with Jenis
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'kode_jenis', 'kode_jenis');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }
}

