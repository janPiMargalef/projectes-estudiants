<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [          
                'title'  => 'PROJECTE 1',   
                'logo'  => '/projectes/proj11.jpg',     
                'company'  => 'company 1',
                'sector' => 'sector 1',
                'description' => 'Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.',
                'budget' => '500€',
                'date' => '05-10-2022',
                'user_id' => 3,
            ],
            
            [          
                'title'  => 'PROJECTE 2',  
                'logo'  => '/projectes/proj9.jpg',     
                'company'  => 'company 2',
                'sector' => 'sector 2',
                'description' => 'Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.',
                'budget' => '400€',
                'date' => '14-06-2023',
                'user_id' => 1,
            ],
            [          
                'title'  => 'PROJECTE 3',
                'logo'  => '/projectes/proj3.jpg',        
                'company'  => 'company 3',
                'sector' => 'sector 3',
                'description' => 'Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.',
                'budget' => '50000€',
                'date' => '26-02-2024',
                'user_id' => 2,
            ],
            
        ];
        
        Project::insert($projects);
    }
}
