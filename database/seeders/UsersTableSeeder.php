<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Creating Admin User
        // DB::table('users')->insert([
        //     'fname' => 'First',
        //     'lname' => 'Admin',
        //     'username' => 'admin',
        //     'email' => 'admin@news.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'admin',
        // ]);
        // // Creating User
        // DB::table('users')->insert([
        //     'fname' => 'First',
        //     'lname' => 'User',
        //     'username' => 'user',
        //     'email' => 'user@news.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
