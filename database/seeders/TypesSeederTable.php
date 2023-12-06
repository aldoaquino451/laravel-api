<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i = 0; $i < 20; $i ++ ) {
            $type = new Type();

            $type->name = $faker->words(1, true);
            $type->slug = Type::generateSlug($type->name);

            $type->save();
        }
    }
}
