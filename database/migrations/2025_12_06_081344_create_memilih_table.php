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
    Schema::create('Memilih', function (Blueprint $table) {
        $table->unsignedInteger('Id_cust');
        $table->unsignedInteger('Id_wisata');

        $table->primary(['Id_cust', 'Id_wisata']);

        $table->foreign('Id_cust')->references('Id_cust')->on('Customer')->onDelete('cascade');
        $table->foreign('Id_wisata')->references('Id_wisata')->on('Wisata')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memilih');
    }
};
