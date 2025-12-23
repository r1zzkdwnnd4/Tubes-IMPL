<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Transaksi')->insert([
            [
                'Id_wisata' => 1,
                'Id_cust'   => 1,
                'Total'     => 4500000,          // isi sesuai harga wisata
                'Status'    => 'Pending',        // atau Completed, Cancelled, dsb
                'Tanggal'   => '2025-12-10',
            ],
            [
                'Id_wisata' => 2,
                'Id_cust'   => 2,
                'Total'     => 12000000,
                'Status'    => 'Pending',
                'Tanggal'   => '2025-12-09',
            ],
            [
                'Id_wisata' => 3,
                'Id_cust'   => 3,
                'Total'     => 2800000,
                'Status'    => 'Pending',
                'Tanggal'   => '2025-12-08',
            ],
        ]);

    }
}
