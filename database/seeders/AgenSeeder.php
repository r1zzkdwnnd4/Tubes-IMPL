<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgenSeeder extends Seeder
{
    public function run()
    {
        DB::table('Agen')->insert([
            [
                'Id_agen' => 1,
                'Area'    => 'Bali Utara',
                'Email'   => 'agen1@travela.com',
                'Password'=> Hash::make('agen123'),
            ],
            [
                'Id_agen' => 2,
                'Area'    => 'Bali Selatan',
                'Email'   => 'agen2@travela.com',
                'Password'=> Hash::make('agen456'),
            ],
        ]);
    }
}
