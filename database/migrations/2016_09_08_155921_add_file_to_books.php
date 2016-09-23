<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileToBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('books',function($table)
            {
               
                $table->string('filename')->nullable()->after('image_path');
                $table->string('original_filename')->nullable()->after('filename');
                $table->string('mime')->nullable()->after('original_filename');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('books',function($table)
            {
                $table->dropColumn('filename');
                $table->dropColumn('mime');
                $table->dropColumn('original_filename');
            });
    }
}
