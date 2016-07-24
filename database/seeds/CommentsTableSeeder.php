<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create(); 
 
        foreach(range(1,5) as $index)
        {
            Comment::create([                
                'content' => $faker->text,
                'id_publication' =>$faker->numberBetween($min = 1, $max = 30),
                'id_user' =>$faker->numberBetween($min = 1, $max = 30)
            ]);
        }
    }
}
