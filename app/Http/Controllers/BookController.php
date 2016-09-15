<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Book;
use Image;
use Storage;
use Response;

class BookController extends Controller
{
    //

   public function index()
   {
      $book=Book::paginate(3);
   	return view('library.index')->with('book',$book);
   } 


   public function show($id)
   {
   	$book=Book::findOrFail($id);
   	return view('library.show')->with('book',$book);
   }

   public function create()
   {
   	return view('library.create');
   }

   public function store(Request $request)
   {
   	$rules=array('title'=>'required','author'=>'required','year'=>'required');
   	$validator=Validator::make($request->all(),$rules);
   		if($validator->fails())
   		{
   			return redirect('/library/create')->withErrors($validator);
   		}
   		else
   		{
   			$book=new Book;
   			$book->title=$request->input('title');
   			$book->author=$request->input('author');
   			$book->category=$request->input('category');
   			$book->year=$request->input('year');

            //Save image file
            if($request->book_cover!=null)
            {
               $image=$request->file('book_cover');
               $fileName=time() . '.' .$image->getClientOriginalExtension(); //getClientOriginalExtension(); it include in image intervention library that we pulled through composer
               $location=public_path('images/' .$fileName);
               Image::make($image)->resize(350,350)->save($location);
               $book->image_path=$fileName;

            }

            if($request->upload_book!=null)
            {
               $file = $request->file('upload_book');
               $extension = $file->getClientOriginalExtension();
               Storage::disk('local')->put($file->getFilename().'.'.$extension, file_get_contents($file));
               
               $book->mime = $file->getClientMimeType();
               $book->original_filename = $file->getClientOriginalName();
               $book->filename = $file->getFilename().'.'.$extension;

               
            }
           
            /*Save files
               using the local driver which is the default driver and it will save to storage/app directory,to change this goto config/filesystem.php and edit it....
               Don't forget to import Storage facade
            */

             /*
               $file=request->file('input tag name');
               Storage::put($file->getClientOriginalName(),file_get_contents($file));
            */

              /*Get files
             *********** Method 2 of adding files *************
              public function add() { 
               $file = Request::file('filefield');
               $extension = $file->getClientOriginalExtension();
               Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
               $entry = new Fileentry();
               $entry->mime = $file->getClientMimeType();
               $entry->original_filename = $file->getClientOriginalName();
               $entry->filename = $file->getFilename().'.'.$extension;
          
               $entry->save();
               }
              
              */ 

            

            // to show the image, put this line in the view
            //<img src="{{asset('images/' . $book->image_path)}}"
            // asset method is used to create public url
   			$book->save();
            
   			\Session::flash('message','Book Added Successfully!!');
            return redirect('/library');
            }


   		}
   		public function edit($id)
         {
            $book=Book::findOrFail($id);
            return view('library.edit',compact('book'));
         }

         public function getBook($filename)
         {
   
            $book = Book::where('filename', '=', $filename)->firstOrFail();
            $file = Storage::disk('local')->get($book->filename);
           
               return Response($file, 200)->header('Content-Type', $book->mime);
        }
   }

   


