<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Agen')->insert([
            [
                'NamaAgen' => 'Agen Bali',
                'Area'     => 'Bali',
                'Email'    => 'agen.bali@travela.com',
                'Password' => Hash::make('bali123'),
            ],
            [
                'NamaAgen' => 'Agen Lombok',
                'Area'     => 'Lombok',
                'Email'    => 'agen.lombok@travela.com',
                'Password' => Hash::make('lombok123'),
            ],
            [
                'NamaAgen' => 'Agen Papua Barat',
                'Area'     => 'Papua Barat',
                'Email'    => 'agen.papua@travela.com',
                'Password' => Hash::make('papua123'),
            ],
        ]);

    }
}
