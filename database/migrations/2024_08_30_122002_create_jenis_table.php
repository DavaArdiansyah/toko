<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis', function (Blueprint $table) {
            $table->string('kode_jenis')->primary(); // Primary key
            $table->string('nama_jenis');
            $table->string('kode_kategori'); // Foreign key
            $table->string('kode_user'); // Foreign key

            // Assuming 'kategori' and 'users' are the names of the related tables
            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori')->onDelete('cascade');
            $table->foreign('kode_user')->references('kode_user')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis');
    }
};

