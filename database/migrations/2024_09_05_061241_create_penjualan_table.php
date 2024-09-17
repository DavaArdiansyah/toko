<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
        Schema::create('penjualan', function (Blueprint $table) {
            // $table->id();
            $table->string('nomor_transaksi')->primary();
            $table->date('tanggal');
            $table->decimal('total_harga', 15, 2);
            $table->decimal('diskon', 15, 2)->default(0);
            $table->decimal('total_bayar', 15, 2);
            $table->string('id_user');
            $table->timestamps();
        });
}
public function down()
{
    Schema::dropIfExists('penjualan');
}

};
