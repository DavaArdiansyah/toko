<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'kode_jenis';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
        'kode_kategori',
        'kode_user',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }
}

