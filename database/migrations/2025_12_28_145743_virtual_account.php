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
        Schema::create('virtual_account', function (Blueprint $table) {
    $table->id('id_va');
    $table->unsignedBigInteger('id_transaksi');
    $table->string('kode_va')->unique();
    $table->dateTime('expired_at');
    $table->timestamps();

    $table->foreign('id_transaksi')
        ->references('id_transaksi')
        ->on('transaksi')
        ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
