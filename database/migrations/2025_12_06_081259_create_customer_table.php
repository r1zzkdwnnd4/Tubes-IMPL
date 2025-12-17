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
    Schema::create('Customer', function (Blueprint $table) {
        $table->increments('Id_cust');
        $table->string('NamaCus', 100);
        $table->string('Email', 100)->unique();
        $table->string('Alamat', 255)->nullable();
        $table->string('NoHP', 20)->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
