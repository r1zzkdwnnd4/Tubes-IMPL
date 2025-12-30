<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Admin')->insert([
            [
                'Departemen' => 'Super Admin',
                'Email'      => 'admin@travela.com',
                'Password'   => Hash::make('admin123')
            ],
            [
                'Departemen' => 'Finance',
                'Email'      => 'finance@travela.com',
                'Password'   => Hash::make('finance123')
            ],
            [
                'departemen' => 'Manager',
                'email' => 'manager@wisata.test',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
