<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Wisata', function (Blueprint $table) {
            $table->increments('Id_wisata');
            $table->string('NamaWisata', 120);
            $table->string('Area', 100); // Bandung, Bali, dll
            $table->text('Deskripsi')->nullable();
            $table->string('Gambar')->nullable(); // simpan nama file / path
            $table->decimal('Harga', 12, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Wisata');
    }
};
