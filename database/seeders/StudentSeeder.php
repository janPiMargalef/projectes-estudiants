<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'education_level' => 'CFGS',
                'school_id' => 1,
                'user_id' => 1,
            ],
            [
                'education_level' => 'GRADO',
                'school_id' => 1,
                'user_id' => 2,
            ],
            [
                'education_level' => 'ESO',
                'school_id' => 2,
                'user_id' => 3,
            ],
            
        ];
        
        Student::insert($students);
    }
}
