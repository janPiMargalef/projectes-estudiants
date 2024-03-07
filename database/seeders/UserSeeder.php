<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Diego',
                'email' => 'Diego@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Joan',
                'email' => 'Joan@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            
        ];
        
        User::insert($users);
    }
}
