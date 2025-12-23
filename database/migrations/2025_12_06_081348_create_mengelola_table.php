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
        Schema::create('Mengelola', function (Blueprint $table) {
            $table->unsignedInteger('Id_admin');
            $table->unsignedInteger('Id_Transaksi');

            $table->primary(['Id_admin', 'Id_Transaksi']);

            $table->foreign('Id_admin')->references('Id_admin')->on('Admin')->onDelete('cascade');
            $table->foreign('Id_Transaksi')->references('Id_Transaksi')->on('Transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mengelola');  // HARUS SAMA!
    }
};