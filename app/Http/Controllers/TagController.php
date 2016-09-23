<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use Validator;

class TagController extends Controller
{
    //

    public function index()
    {
  		$tags=Tag::all();
  		return view('tags.index')->with('tags',$tags);

    }


    public function store(Request $request)
    {
    	$rules= array('name' => 'required',);
    	$validator=Validator::make($request->all(),$rules);
    	if($validator->fails())
    	{
    		return redirect('/tag')->withErrors($validator);
    	}	
    	else
    	{
    		$tags=new Tag;
    		$tags->name=$request->name;
    		$tags->save();
    		\Session::flash('message','New Tag created successfully');
    		return redirect('/tag');
    	}
    }
}
