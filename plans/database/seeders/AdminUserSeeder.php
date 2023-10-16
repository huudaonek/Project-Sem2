<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Thêm một người dùng với vai trò 'admin'
        DB::table('users')->insert([
            'FullName' => 'admin1',
            'UserName' => 'admin1',
            'Phone' => '0365405202',
            'Email' => 'admin1@gmail.com',
            'Password' => Hash::make('admin1'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        DB::table('users')->insert([
            'FullName' => 'user1',
            'UserName' => 'user1',
            'Phone' => '0365405209',
            'Email' => 'user1@gmail.com',
            'Password' => Hash::make('user11'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

