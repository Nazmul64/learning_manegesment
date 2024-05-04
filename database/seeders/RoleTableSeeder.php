<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
           [
                'name' => "Admin",
                'username' => "admin",
                'email' => "admin@gmail.com",
                'password' => Hash::make('admin@gmail.com'),
                'role' => 'admin',
                'status' => 1,
           ],
            [
                'name' => "instructor",
                'username' => "instructor",
                'email' => "instructor@gmail.com",
                'password' => Hash::make('instructor@gmail.com'),
                'role' => 'instructor',
                'status' => 1,
            ],
             [
                'name' => "user",
                'username' => "user",
                'email' => "user@gmail.com",
                'password' => Hash::make('user@gmail.com'),
                'role' => 'user',
                'status' => 1,
            ]
        ]);
    }
}
