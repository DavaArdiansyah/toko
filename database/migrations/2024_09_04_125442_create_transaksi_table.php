<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('kode_transaksi')->primary(); // Primary key
            $table->string('kode_user');
            $table->foreign('kode_user')->references('kode_user')->on('users')->onUpdate('cascade')->onDelete('cascade'); // Foreign key ke tabel barang
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->decimal('tanggal', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
