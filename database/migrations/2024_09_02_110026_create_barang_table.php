<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('kode_barang', 20)->primary();
            $table->string('nama_barang', 100);
            $table->string('kode_jenis', 20);
            $table->decimal('harga_beli', 15, 2);
            $table->decimal('harga_jual', 15, 2);
            $table->integer('stok');
            $table->decimal('diskon', 5, 2)->nullable();
            $table->string('kode_user', 20);
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('kode_jenis')->references('kode_jenis')->on('jenis')->onDelete('cascade');
            $table->foreign('kode_user')->references('kode_user')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
};


