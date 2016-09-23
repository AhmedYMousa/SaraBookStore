<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    //

  protected $table='books';
  protected $fillable=['title','author','category','year'];  

	public function author()
	{
  		return $this->belongsTo(Author::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function scopePublished($query)
	{
		return $query->where('year','<=',Carbon::now());
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}		
}