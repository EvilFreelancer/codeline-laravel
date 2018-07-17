<?php

use App\Models\Films;
use App\Helpers;
use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Films::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            Films::create([
                'name' => $name,
                'slug' => Helpers::slug($name),
                'description' => $faker->text,
                'release_date' => $faker->date(),
                'rating' => $faker->biasedNumberBetween($min = 1, $max = 5),
                'ticket_price' => $faker->biasedNumberBetween($min = 10, $max = 100),
                'country' => $faker->country,
                // Few genres of film
                'genres' => json_encode($faker->randomElements([1, 2, 3, 4, 5])),
                'photo' => $faker->imageUrl(640, 480)
            ]);
        }
    }
}
