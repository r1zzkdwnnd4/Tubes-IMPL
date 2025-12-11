<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AgenSeeder::class,
            CustomerSeeder::class,
            WisataSeeder::class,
            AdminSeeder::class,
            TransaksiSeeder::class,
            MenawarkanSeeder::class,
            MemilihSeeder::class,
            MengelolaSeeder::class,
        ]);
    }
}
