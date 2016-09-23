<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

	protected $table="tags";
	
   public function books()
   {
   	/*Structure of this relation
   	Model to link,Intermediary table name,Column name for current model,Column name for joining model
   	the first param is reqiured and the other is optional,but preferred to use it*/
	   	 return $this->belongsToMany(Book::class);
   } 
}
