<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemilihSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Memilih')->insert([
            [ 'Id_cust' => 1, 'Id_wisata' => 1 ],
            [ 'Id_cust' => 2, 'Id_wisata' => 2 ],
            [ 'Id_cust' => 3, 'Id_wisata' => 3 ],
        ]);
    }
}
