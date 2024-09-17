<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'test_user',
            'email' => 'test_user@gmail.com',
            'password' => Hash::make('testpassword123'),
            'role' => 'kasir', // Sesuaikan dengan nilai enum yang valid
        ]);
    }
}
