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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->string('kode_barang_masuk')->primary(); // Primary key
            $table->string('kode_barang'); // Foreign key
            $table->integer('stok');
            $table->string('nama_supplier');
            $table->date('tanggal');
            $table->string('kode_user'); // Foreign key

            $table->foreign('kode_barang')->references('kode_barang')->on('barang'); // Assuming 'barang' is the name of the related table
            $table->foreign('kode_user')->references('kode_user')->on('users'); // Reference to users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
