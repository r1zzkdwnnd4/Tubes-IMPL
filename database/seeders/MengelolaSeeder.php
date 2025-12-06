<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MengelolaSeeder extends Seeder
{
    public function run()
    {
        DB::table('Mengelola')->insert([
            ['Id_admin' => 1, 'Id_Transaksi' => 1],
            ['Id_admin' => 2, 'Id_Transaksi' => 2],
            ['Id_admin' => 3, 'Id_Transaksi' => 3],
        ]);
    }
}
