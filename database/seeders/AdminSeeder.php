<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('Admin')->insert([
            [
                'Id_admin'   => 1,
                'Departemen' => 'Super Admin',
                'Email'      => 'admin@travela.com',
                'Password'   => Hash::make('admin123'),
            ],
            [
                'Id_admin'   => 2,
                'Departemen' => 'Manajemen',
                'Email'      => 'manager@travela.com',
                'Password'   => Hash::make('manager123'),
            ],
        ]);
    }
}
