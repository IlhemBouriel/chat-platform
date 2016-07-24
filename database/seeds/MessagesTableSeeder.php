<?php

use Illuminate\Database\Seeder;
use App\Message;
class MessagesTableSeeder extends Seeder
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
                'sender' => $faker->numberBetween($min = 1, $max = 30),
                'receiver' => $faker->numberBetween($min = 1, $max = 30),
                'id_disc' => $faker->numberBetween($min = 1, $max = 30),
                'sending_date'=> $faker->dateTime()
            ]);
        }
    }
}
