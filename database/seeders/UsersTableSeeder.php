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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'Admin',
                'status' => 'active'
            
            ],
            //Agent
            [
                'name' => 'agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'agent',
                'status' => 'active'
            
            ],
            //user
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'user',
                'status' => 'active'
            
            ]
        ]);
    }
}
