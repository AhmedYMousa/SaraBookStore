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
        $faker=\Faker\Factory::create();

        for ($i=0; $i < Config::get('seeding.books'); $i++)
        {
        	$books=App\Book::create(
        		['title'	=>	$faker->title,
        		 'author'	=>	$faker->name,
        		 'user_id'	=>	$faker->randomDigitNotNull,
        		 'category_id'	=>	$faker->randomDigitNotNull,
        		 'image_path'	=>	$faker->text(50),
        		 'year'		=>	$faker->year,
        		 'description'	=>	$faker->text(200),]);
        }
    }
}
