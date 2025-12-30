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
                'Id_cust'            => 1,
                'Id_wisata'          => 1,
                'Jumlah_Orang'       => 3,
                'Tanggal_Travel'     => '2025-12-10',
                'Metode_Pembayaran'  => 'Transfer Bank',
                'Total'              => 4500000,
                'Status'             => 'Pending',
                'Kode_Booking'       => 'BK-SEED-001',
            ],
            [
                'Id_cust'            => 2,
                'Id_wisata'          => 2,
                'Jumlah_Orang'       => 4,
                'Tanggal_Travel'     => '2025-12-09',
                'Metode_Pembayaran'  => 'Kartu Kredit',
                'Total'              => 12000000,
                'Status'             => 'Pending',
                'Kode_Booking'       => 'BK-SEED-002',
            ],
            [
                'Id_cust'            => 3,
                'Id_wisata'          => 3,
                'Jumlah_Orang'       => 2,
                'Tanggal_Travel'     => '2025-12-08',
                'Metode_Pembayaran'  => 'E-Wallet',
                'Total'              => 2800000,
                'Status'             => 'Pending',
                'Kode_Booking'       => 'BK-SEED-003',
            ],
        ]);
    }
}