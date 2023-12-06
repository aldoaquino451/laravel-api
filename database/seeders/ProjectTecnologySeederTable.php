<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tecnology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTecnologySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ( $i = 0; $i < 150; $i++ ) {
            // salvo un elemento project randomico
            $project = Project::inRandomOrder()->first();

            // salvo un id di un elemento tecnology random
            $tecnology_id = Tecnology::inRandomOrder()->first()->id;

            // assegno ad ogni variabile project una variabile tecnology_id
            $project->tecnologies()->attach($tecnology_id);
        }
    }
}
