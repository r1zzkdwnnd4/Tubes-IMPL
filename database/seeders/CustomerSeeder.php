<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Customer')->insert([
            [
                'NamaCustomer' => 'Budi Santoso',
                'Email'        => 'budi@gmail.com',
                'Password'     => Hash::make('budi123'),
                'NoHP'         => '08123456789',
            ],
            [
                'NamaCustomer' => 'Siti Aminah',
                'Email'        => 'siti@gmail.com',
                'Password'     => Hash::make('siti123'),
                'NoHP'         => '08123456788',
            ],
            [
                'NamaCustomer' => 'Ahmad Rizki',
                'Email'        => 'rizki@gmail.com',
                'Password'     => Hash::make('rizki123'),
                'NoHP'         => '08123456787',
            ],
        ]);

    }
}