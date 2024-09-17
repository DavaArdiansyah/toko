<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan ini ada
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'staf_gudang',
            'email' => 'staf_gudang@gmail.com',
            'password' => Hash::make('stafgudang123'),
            'role' => 'staf_gudang',
        ]);


        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir'
        ]);

        User::create([
            'name' => 'kepala_toko',
            'email' => 'kepala_toko@gmail.com',
            'password' => Hash::make('kepalatoko123'),
            'role' => 'kepala_toko'
        ]);
    }
}
