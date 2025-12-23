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
    Schema::create('Menawarkan', function (Blueprint $table) {
        $table->unsignedInteger('Id_agen');
        $table->unsignedInteger('Id_cust');

        $table->primary(['Id_agen', 'Id_cust']);

        $table->foreign('Id_agen')->references('Id_agen')->on('Agen')->onDelete('cascade');
        $table->foreign('Id_cust')->references('Id_cust')->on('Customer')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menawarkan');
    }
};