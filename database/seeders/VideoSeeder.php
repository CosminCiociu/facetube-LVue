<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use Faker\Factory as Faker;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Faker\Provider\Youtube($faker));

        for ($i=0; $i < 100; $i++) { 
	    	Video::create([
	            'title' => $faker->title,
	            'url' => $faker->youtubeUri(),
	        ]);
    	}
    }
}
