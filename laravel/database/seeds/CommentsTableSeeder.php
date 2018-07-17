<?php

use App\Models\Comments;
use App\Helpers;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Comments::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 20; $i++) {
            Comments::create([
                'id_film' => $faker->biasedNumberBetween($min = 1, $max = 10),
                'id_user' => $faker->biasedNumberBetween($min = 1, $max = 11),
                'comment' => $faker->text,
            ]);
        }
    }
}
