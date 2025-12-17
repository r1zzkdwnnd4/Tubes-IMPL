<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenawarkanSeeder extends Seeder
{
    public function run()
    {
        DB::table('Menawarkan')->insert([
            ['Id_agen' => 1, 'Id_cust' => 1],
            ['Id_agen' => 2, 'Id_cust' => 2],
            ['Id_agen' => 3, 'Id_cust' => 3],
        ]);
    }
}
