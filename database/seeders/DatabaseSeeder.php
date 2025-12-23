<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            AgenSeeder::class,
            CustomerSeeder::class,
            WisataSeeder::class,
            TransaksiSeeder::class,
            MenawarkanSeeder::class,
            MemilihSeeder::class,
        ]);
    }
}