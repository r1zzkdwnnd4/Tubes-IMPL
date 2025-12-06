<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('Admin')->insert([
            ['Departemen' => 'Keuangan'],
            ['Departemen' => 'Operasional'],
            ['Departemen' => 'Customer Service']
        ]);
    }
}
