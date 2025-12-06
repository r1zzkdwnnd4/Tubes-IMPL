<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('Transaksi')->insert([
            [
                'Id_wisata' => 1,
                'Id_cust' => 1,
                'Jadwal' => '2025-12-10'
            ],
            [
                'Id_wisata' => 2,
                'Id_cust' => 2,
                'Jadwal' => '2025-12-15'
            ],
            [
                'Id_wisata' => 3,
                'Id_cust' => 3,
                'Jadwal' => '2025-12-20'
            ],
        ]);
    }
}
