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
                'image' => '/images/profile-images/ip3.jpg',
                'occupation' => 'mentor',
            ],
            [
                'name' => 'Diego',
                'email' => 'Diego@gmail.com',
                'password' => bcrypt('12345678'),
                'image' => '/images/profile-images/ip2.jpg',
                'occupation' => 'student',
            ],
            [
                'name' => 'Joan',
                'email' => 'Joan@gmail.com',
                'password' => bcrypt('12345678'),
                'image' => '/images/profile-images/ip1.png',
                'occupation' => 'student',
            ],
            
        ];
        
        User::insert($users);
    }
}
