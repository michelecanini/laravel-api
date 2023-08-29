<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\New_;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Websites', 'Web-Applications', 'E-commerce', 'Games', 'Mobile-applications', 'Open-source'];

        foreach ($types as $item){

            $type = new Type();

            $type->name = $item;
            $type->slug = Str::slug($item, '-');

            $type->save();
        }
    }
}
