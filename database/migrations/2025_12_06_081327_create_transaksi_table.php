<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->increments('Id_transaksi');

            $table->unsignedInteger('Id_cust');
            $table->unsignedInteger('Id_wisata');

            // === DATA BOOKING ===
            $table->integer('Jumlah_Orang');
            $table->date('Tanggal_Travel');

            // === PEMBAYARAN (DUMMY) ===
            $table->string('Metode_Pembayaran', 50);

            // === TOTAL & STATUS ===
            $table->decimal('Total', 12, 2);
            $table->string('Status', 30)->default('menunggu');

            // === IDENTITAS BOOKING ===
            $table->string('Kode_Booking', 20)->unique();

            // === RELASI ===
            $table->foreign('Id_cust')
                ->references('Id_cust')->on('Customer')
                ->onDelete('cascade');

            $table->foreign('Id_wisata')
                ->references('Id_wisata')->on('Wisata')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Transaksi');
    }
};