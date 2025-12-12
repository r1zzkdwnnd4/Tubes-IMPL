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

            $table->decimal('Total', 12, 2);
            $table->string('Status', 50);
            $table->date('Tanggal');

            $table->foreign('Id_cust')->references('Id_cust')->on('Customer')->onDelete('cascade');
            $table->foreign('Id_wisata')->references('Id_wisata')->on('Wisata')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Transaksi');
    }
};
