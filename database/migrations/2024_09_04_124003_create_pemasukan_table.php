<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->string('kode_pemasukan')->primary(); // Example column
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade'); // Foreign key ke tabel barang
            $table->decimal('jumlah', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
};

