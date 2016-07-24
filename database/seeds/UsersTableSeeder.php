<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
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
            User::create([                
                'name' =>  $faker->name,
                'email' =>$faker->email,
                'password'=>$faker->password,
                'status'=> $faker->randomElement($array = ['online', 'offline'])
            ]);
        }
    }
}
