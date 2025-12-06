<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenSeeder extends Seeder
{
    public function run()
    {
        DB::table('Agen')->insert([
            ['Area' => 'Denpasar'],
            ['Area' => 'Ubud'],
            ['Area' => 'Kuta'],
            ['Area' => 'Jimbaran'],
        ]);
    }
}
