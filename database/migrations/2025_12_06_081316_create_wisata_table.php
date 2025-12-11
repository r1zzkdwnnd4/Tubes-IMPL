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
    Schema::create('Wisata', function (Blueprint $table) {
        $table->increments('Id_wisata');
        $table->string('NamaWisata', 100);
        $table->string('Lokasi', 100)->nullable();
        $table->decimal('Harga', 10, 2);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
