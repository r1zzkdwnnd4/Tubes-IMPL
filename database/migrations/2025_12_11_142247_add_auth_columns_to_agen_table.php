<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('Agen', function ($table) {
                $table->string('Email')->unique()->after('Area');
                $table->string('Password')->after('Email');
            });
        }

        public function down()
        {
            Schema::table('Agen', function ($table) {
                $table->dropColumn(['Email', 'Password']);
            });
        }
};
