<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin3',
                'email' => 'admin3@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'role' => 'user',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'role' => 'user',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'role' => 'user',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
