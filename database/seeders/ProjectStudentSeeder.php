<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projects_students')->insert([
            'student_id' => 1,
            'project_id' => 1   
        ]);
        DB::table('projects_students')->insert([
            'student_id' => 2,
            'project_id' => 1   
        ]);
        DB::table('projects_students')->insert([
            'student_id' => 3,
            'project_id' => 1   
        ]);
    }
}