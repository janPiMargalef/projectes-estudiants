<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = [
            [
                'motivation' => 'Enseñar marketing',
                'location' => 'Alemania',
                'expertise' => 'Marketing',
                'company' => "Microsoft",
                'career_summary' => 'Trabajado como director de marketing en Microsoft',
                'linkedin' => 'www.linkedin.com/in/jan-pi-margalef-3a41962b7',
                'user_id' => 4,

            ],
            [
                'motivation' => 'Enseñar cocina',
                'location' => 'Croacia',
                'expertise' => 'Cocina',
                'company' => "AliExpress",
                'career_summary' => 'Trabajado como director de cocina en Aliexpress',
                'linkedin' => 'www.linkedin.com/in/jan-pi-margalef-3a41962b7',
                'user_id' => 5,

            ],
            [
                'motivation' => 'Enseñar informatica',
                'location' => 'España',
                'expertise' => 'Software engineer',
                'company' => "Apple",
                'career_summary' => 'Trabajado como director de software en Apple',
                'linkedin' => 'www.linkedin.com/in/jan-pi-margalef-3a41962b7',
                'user_id' => 6,

            ],
            
        ];
        
        Mentor::insert($mentors);
    }
} 
