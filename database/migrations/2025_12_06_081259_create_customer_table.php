<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->increments('Id_cust');
            $table->string('NamaCustomer', 100);
            $table->string('Email', 100)->unique();
            $table->string('Alamat', 255)->nullable(); // ✅ DITAMBAHKAN
            $table->string('NoHP', 20);
            $table->string('Password', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Customer');
    }
};