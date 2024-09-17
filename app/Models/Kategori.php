<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $primaryKey = 'kode_kategori'; // Menentukan primary key

    public $incrementing = false; // Non-incrementing primary key

    protected $keyType = 'string'; // Tipe data primary key adalah string

    protected $fillable = ['kode_kategori', 'nama_kategori', 'kode_user'];

    public static function boot()
    {
        parent::boot();

        // Event untuk mengisi kode_kategori secara otomatis
        self::creating(function ($model) {
            // Logika untuk kode kategori otomatis
            $latestKategori = self::orderBy('kode_kategori', 'desc')->first();
            if ($latestKategori) {
                $lastNumber = (int) substr($latestKategori->kode_kategori, 4);
                $model->kode_kategori = 'KAT-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $model->kode_kategori = 'KAT-0001';
            }
        });
    }
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kode_kategori', 'kode_kategori');

        return $this->hasMany(User::class, 'kode_user', 'kode_user');
    }
}
