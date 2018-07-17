<?php

use App\Models\Genres;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Genres::truncate();

        // Create few columns
        Genres::create(['name' => 'Action']);
        Genres::create(['name' => 'Comedy']);
        Genres::create(['name' => 'Arthouse']);
        Genres::create(['name' => 'Music']);
        Genres::create(['name' => 'Thriller']);
    }
}
