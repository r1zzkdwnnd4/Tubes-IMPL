<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Wisata')->insert([
            [
                'NamaWisata' => 'Paket Bali 3D2N',
                'Area'       => 'Bali',
                'Harga'      => 4500000,
            ],
            [
                'NamaWisata' => 'Raja Ampat 5D4N',
                'Area'       => 'Papua Barat',
                'Harga'      => 12000000,
            ],
            [
                'NamaWisata' => 'Yogyakarta Cultural',
                'Area'       => 'Yogyakarta',
                'Harga'      => 2800000,
            ],
            [
                'NamaWisata' => 'Lombok Paradise',
                'Area'       => 'Lombok',
                'Harga'      => 5200000,
            ],
            [
                'NamaWisata' => 'Bromo Sunrise',
                'Area'       => 'Jawa Timur',
                'Harga'      => 1800000,
            ],
        ]);

    }
}
