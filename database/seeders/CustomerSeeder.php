<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('Customer')->insert([
            [
                'NamaCus' => 'Budi Santoso',
                'Email' => 'budi@example.com',
                'Alamat' => 'Jakarta',
                'NoHP' => '08123456789'
            ],
            [
                'NamaCus' => 'Siti Aminah',
                'Email' => 'siti@example.com',
                'Alamat' => 'Surabaya',
                'NoHP' => '082233445566'
            ],
            [
                'NamaCus' => 'Rian Hidayat',
                'Email' => 'rian@example.com',
                'Alamat' => 'Bandung',
                'NoHP' => '08177889900'
            ]
        ]);
    }
}
