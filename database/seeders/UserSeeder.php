<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'kode_user' => 'USR001',
            'name' => 'staf_gudang',
            'email' => 'staf_gudang@gmail.com',
            'password' => Hash::make('stafgudang123'),
            'role' => 'staf_gudang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'kode_user' => 'USR002',
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'kode_user' => 'USR003',
            'name' => 'kepala_toko',
            'email' => 'kepala_toko@gmail.com',
            'password' => Hash::make('kepalatoko123'),
            'role' => 'kepala_toko',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

