<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TecnologiesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i = 0; $i < 10; $i ++ ) {
            $tecnology = new Tecnology();

            $tecnology->name = $faker->words(1, true);
            $tecnology->slug = Tecnology::generateSlug($tecnology->name);
            $tecnology->version = $faker->randomFloat(2, 1, 50);

            $tecnology->save();
        }
    }
}
