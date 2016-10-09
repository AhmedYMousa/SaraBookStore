<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define('App\User', function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define('App\Book', function (Faker\Generator $faker) {

	return [
			'title'	=>	$faker->sentence,
    		 'author'	=>	$faker->name,
    		 'user_id'	=>	$faker->randomDigitNotNull,
    		 'category_id'	=>	$faker->randomDigitNotNull,
    		 'image_path'	=>	$faker->text(50),
    		 'year'		=>	$faker->year,
    		 'description'	=>	$faker->paragraph,];
    
});
