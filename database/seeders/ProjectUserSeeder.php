<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projects_users')->insert([
            'type' => "saved",
            'user_id' => 2,
            'project_id' => 1   
        ]);
        DB::table('projects_users')->insert([
            'type' => "like",
            'user_id' => 2,
            'project_id' => 2
    
        ]);
        DB::table('projects_users')->insert([
            'type' => "like",
            'user_id' => 2,
            'project_id' => 3 
        ]);
        DB::table('projects_users')->insert([
            'type' => "match",
            'user_id' => 1,
            'project_id' => 3
    
        ]);
    }
}
