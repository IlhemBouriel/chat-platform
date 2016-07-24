<?php

use Illuminate\Database\Seeder;
use App\User;
class PublicationsTableSeeder extends Seeder
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
            Message::create([                
                'content' => $faker->text,
                'user_id' => $faker->numberBetween($min = 1, $max = 30)
            ]);
        }
    }
}
