<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('kode_user')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['staf_gudang', 'kepala_toko', 'kasir']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
