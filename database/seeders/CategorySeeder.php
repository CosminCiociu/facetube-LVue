<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
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
        for ($i=0; $i < 10; $i++) { 
	    	Category::create([
	            'title'         => $faker->text(15),
	            'imageUrl'      => $faker->imageUrl($width = 640, $height = 480),
	        ]);
    	}
    }
}
