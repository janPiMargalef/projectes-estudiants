<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Vidal i Barraquer',
                'address' => 'Tarragona calle 1',
            ],
            [
                'name' => 'Universitat RiV',
                'address' => 'Tarragona, calle 2',
            ],
            [
                'name' => 'Instituto 3',
                'address' => 'Tarragona calle 3',
            ],
            
        ];
        
        School::insert($schools); 
    }
} 
