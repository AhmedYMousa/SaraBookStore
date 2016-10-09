<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	protected $tables=['users','books'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();  
    	//To bypass foreign key constraints to be able to truncate tables with foreign keys
    	DB::statement('	SET FOREIGN_KEY_CHECKS=0;');
    	foreach ($this->tables as $table) {
    		
    		DB::table($table)->truncate();
    	}
    	DB::statement('	SET FOREIGN_KEY_CHECKS=1;');
    	    
        $this->call('BooksTableSeeder');
        Model::reguard();
    }
}
