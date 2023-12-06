<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i = 0; $i < 100; $i ++ ) {
            $project = new Project();

            $project->name = $faker->words(3, true);
            $project->slug = Project::generateSlug($project->name);
            $project->date = $faker->date();
            $project->description = $faker->text();

            $project->save();
        }
    }
}
