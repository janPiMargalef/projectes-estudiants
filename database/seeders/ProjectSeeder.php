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
                'content' => 'El proyecto de energía eólica "Vientos Sostenibles" se encuentra en pleno corazón de la región montañosa del valle de San Miguel. Con la creciente demanda de fuentes de energía limpia y sostenible, este proyecto se presenta como una solución innovadora para satisfacer las necesidades energéticas de la comunidad local y contribuir a la reducción de las emisiones de gases de efecto invernadero.

                La ubicación estratégica del proyecto aprovecha los fuertes vientos que soplan de manera constante a través de las crestas montañosas circundantes. Con la instalación de aerogeneradores de última generación, se estima que "Vientos Sostenibles" será capaz de generar una capacidad eléctrica de hasta 100 megavatios, suficiente para abastecer a miles de hogares y negocios en la zona.
                
                Además de su impacto positivo en el medio ambiente, el proyecto también promueve el desarrollo económico local. La construcción y operación de la planta eólica proporcionará empleo a cientos de trabajadores locales, desde ingenieros y técnicos hasta personal de mantenimiento y administrativo. Además, se establecerán programas de formación y capacitación para garantizar que la comunidad pueda beneficiarse plenamente de las oportunidades de empleo generadas por el proyecto.
                
                En términos de sostenibilidad, "Vientos Sostenibles" se compromete a minimizar su huella ambiental en todas las etapas de su ciclo de vida. Se llevarán a cabo evaluaciones ambientales exhaustivas para mitigar cualquier impacto negativo en la biodiversidad local y se implementarán medidas de conservación del suelo y del agua para proteger los ecosistemas circundantes.',
                'image' => '/images/molins.jpg',
                'date' => '05-10-2022',
                'teacher_name' => 'Carlos',
                'teacher_email' => 'Carlos@gmail.com',
                'mentor_preferences' => 'Experiencia en desarollo de software y sistemas.',
                'education_level' => 'ESO',
                'mentor_id' => 1,
                'school_id' => 1,
                'user_id' => 3,
            ],
            
            [          
                'title'  => 'PROJECTE 2',   
                'logo'  => '/projectes/proj5.jpg',     
                'company'  => 'company 2',
                'sector' => 'sector 1',
                'description' => 'Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.',
                'content' => 'El proyecto de energía eólica "Vientos Sostenibles" se encuentra en pleno corazón de la región montañosa del valle de San Miguel. Con la creciente demanda de fuentes de energía limpia y sostenible, este proyecto se presenta como una solución innovadora para satisfacer las necesidades energéticas de la comunidad local y contribuir a la reducción de las emisiones de gases de efecto invernadero.

                La ubicación estratégica del proyecto aprovecha los fuertes vientos que soplan de manera constante a través de las crestas montañosas circundantes. Con la instalación de aerogeneradores de última generación, se estima que "Vientos Sostenibles" será capaz de generar una capacidad eléctrica de hasta 100 megavatios, suficiente para abastecer a miles de hogares y negocios en la zona.
                
                Además de su impacto positivo en el medio ambiente, el proyecto también promueve el desarrollo económico local. La construcción y operación de la planta eólica proporcionará empleo a cientos de trabajadores locales, desde ingenieros y técnicos hasta personal de mantenimiento y administrativo. Además, se establecerán programas de formación y capacitación para garantizar que la comunidad pueda beneficiarse plenamente de las oportunidades de empleo generadas por el proyecto.
                
                En términos de sostenibilidad, "Vientos Sostenibles" se compromete a minimizar su huella ambiental en todas las etapas de su ciclo de vida. Se llevarán a cabo evaluaciones ambientales exhaustivas para mitigar cualquier impacto negativo en la biodiversidad local y se implementarán medidas de conservación del suelo y del agua para proteger los ecosistemas circundantes.',
                'image' => '/images/molins.jpg',
                'date' => '05-10-2022',
                'teacher_name' => 'Carlos',
                'teacher_email' => 'Carlos@gmail.com',
                'mentor_preferences' => 'Experiencia en desarollo de software y sistemas.',
                'education_level' => 'ESO',
                'mentor_id' => 2,
                'school_id' => 1,
                'user_id' => 3,
            ],
            
            [          
                'title'  => 'PROJECTE 3',   
                'logo'  => '/projectes/proj3.jpg',     
                'company'  => 'company 3',
                'sector' => 'sector 3',
                'description' => 'Lorem ipsum dolor sit amet. Eum quia quia 33 accusantium sint et dolores itaque est quasi facilis ea nulla rerum.',
                'content' => 'El proyecto de energía eólica "Vientos Sostenibles" se encuentra en pleno corazón de la región montañosa del valle de San Miguel. Con la creciente demanda de fuentes de energía limpia y sostenible, este proyecto se presenta como una solución innovadora para satisfacer las necesidades energéticas de la comunidad local y contribuir a la reducción de las emisiones de gases de efecto invernadero.

                La ubicación estratégica del proyecto aprovecha los fuertes vientos que soplan de manera constante a través de las crestas montañosas circundantes. Con la instalación de aerogeneradores de última generación, se estima que "Vientos Sostenibles" será capaz de generar una capacidad eléctrica de hasta 100 megavatios, suficiente para abastecer a miles de hogares y negocios en la zona.
                
                Además de su impacto positivo en el medio ambiente, el proyecto también promueve el desarrollo económico local. La construcción y operación de la planta eólica proporcionará empleo a cientos de trabajadores locales, desde ingenieros y técnicos hasta personal de mantenimiento y administrativo. Además, se establecerán programas de formación y capacitación para garantizar que la comunidad pueda beneficiarse plenamente de las oportunidades de empleo generadas por el proyecto.
                
                En términos de sostenibilidad, "Vientos Sostenibles" se compromete a minimizar su huella ambiental en todas las etapas de su ciclo de vida. Se llevarán a cabo evaluaciones ambientales exhaustivas para mitigar cualquier impacto negativo en la biodiversidad local y se implementarán medidas de conservación del suelo y del agua para proteger los ecosistemas circundantes.',
                'image' => '/images/molins.jpg',
                'date' => '05-10-2022',
                'teacher_name' => 'Ramon',
                'teacher_email' => 'Ramon@gmail.com',
                'mentor_preferences' => 'Experiencia en marketing.',
                'education_level' => 'CFGS',
                'mentor_id' => 3,
                'school_id' => 2,
                'user_id' => 2,
            ],
            
        ];
        
        Project::insert($projects);
    }
}

