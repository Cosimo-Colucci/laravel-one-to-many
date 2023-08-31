<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Validation\Rules\Unique;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all()->pluck('id');
        // dd($types);
        for ($i=0; $i < 50; $i++) { 
            $newProject = new Project();
            $newProject->type_id = ($faker->randomElement($types));
            $newProject->title = ucfirst($faker->Unique()->words(5, true));
            $newProject->content = $faker->paragraphs(50, true);
            $newProject->project_start = $faker->dateTime();
            $newProject->slug = $faker->slug();
            $newProject->image = $faker->imageUrl();
            $newProject->owner = $faker->name();
            $newProject->save();
        }
    }
}
