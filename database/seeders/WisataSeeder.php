<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    public function run()
    {
        DB::table('Wisata')->insert([
            [
                'NamaWisata' => 'Pantai Kuta',
                'Lokasi' => 'Kuta',
                'Harga' => 150000
            ],
            [
                'NamaWisata' => 'Tanah Lot',
                'Lokasi' => 'Tabanan',
                'Harga' => 200000
            ],
            [
                'NamaWisata' => 'Ubud Monkey Forest',
                'Lokasi' => 'Ubud',
                'Harga' => 180000
            ]
        ]);
    }
}
