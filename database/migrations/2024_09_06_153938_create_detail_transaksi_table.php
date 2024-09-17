<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('kode_detail_transaksi');
            $table->string('kode_transaksi');
            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksi')->onDelete('cascade');
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
