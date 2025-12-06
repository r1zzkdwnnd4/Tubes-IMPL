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
    Schema::create('Transaksi', function (Blueprint $table) {
        $table->increments('Id_Transaksi');

        $table->unsignedInteger('Id_wisata');
        $table->unsignedInteger('Id_cust');

        $table->date('Jadwal');

        $table->foreign('Id_wisata')->references('Id_wisata')->on('Wisata')->onDelete('cascade');
        $table->foreign('Id_cust')->references('Id_cust')->on('Customer')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
