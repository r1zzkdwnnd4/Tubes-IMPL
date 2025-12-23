<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Agen', function (Blueprint $table) {
            $table->increments('Id_agen');
            $table->string('NamaAgen', 100);
            $table->string('Area', 100);
            $table->string('Email', 100)->unique();
            $table->string('Password', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Agen');
    }
};