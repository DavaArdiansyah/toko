<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturBarangTable extends Migration
{
    public function up()
    {
        Schema::create('retur_barang', function (Blueprint $table) {
            $table->string('kode_retur_barang')->primary();
            $table->foreignId('kode_barang')->constrained()->onDelete('cascade');
            $table->integer('stok');
            $table->string('nama_supplier');
            $table->date('tanggal');
            $table->foreignId('kode_user')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('retur_barang');
    }
}


