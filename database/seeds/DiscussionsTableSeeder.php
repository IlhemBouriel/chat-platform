<?php

use Illuminate\Database\Seeder;
use App\Discussion;
class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); 
 
        foreach(range(1,30) as $index)
        {
            Discussion::create([                
                'user1' => $faker->numberBetween($min = 1, $max = 30),
                'user2' => $faker->numberBetween($min = 1, $max = 30)
            ]);
        }
    }
}
