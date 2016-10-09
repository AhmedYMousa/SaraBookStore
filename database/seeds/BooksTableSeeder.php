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
        

       	factory('App\Book',10)->create([
        		 'title'	=>	'Laravel',
        		 'author'	=>	'Taylor Otwell',
        		 'user_id'	=>	rand(0,20),
        		 'category_id'	=>	rand(0,20),
        		 'image_path'	=>	'defualt',
        		 'year'		=>	2010,
        		 'description'	=>	'Body',]);
        
    }
}
