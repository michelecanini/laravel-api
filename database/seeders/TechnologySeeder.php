<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            
            'HTML5',
            'CSS3',
            'Markdown',
            'Javascript', 
            'JQuery',
            'Bootstrap', 
            'Sass', 
            'VueJS', 
            'Vite',
            'Symfony',
            'PHP', 
            'Laravel', 
            'SQL',
            'MySQL', 
            'PostgreSQL',
            'MongoDB',
            'Typescript',
            'NodeJS',
            'Django',  
            'React',
            'Git',
            'GitHub',
            'Angular',
            'C',
            'C++',
            'C#',
            'Pyton',
            'Java',
            'GO',
            'XML',
            'AJAX',
            'JSON',
            
        ];

        foreach ($technologies as $technology){
            $new_technology = New Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($technology, '-');

            $new_technology->save();
        }
    }
}
