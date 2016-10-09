<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker\Factory::create();

       	factory('App\Book',10)->create([
        		 'title'	=>	$faker->sentence,
        		 'author'	=>	$faker->name,
        		 'user_id'	=>	$faker->randomDigitNotNull,
        		 'category_id'	=>	$faker->randomDigitNotNull,
        		 'image_path'	=>	$faker->text(50),
        		 'year'		=>	$faker->year,
        		 'description'	=>	$faker->paragraph,]);
        
    }
}
