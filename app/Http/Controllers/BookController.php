<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Book;
use Image,Auth;
use Storage;
use App\Tag;
use App\Category,App\User,File;
use Response,Session,Gate;
class BookController extends Controller
{
    
   
   public function index()
   {
      $book=Book::orderBy('year','desc')->paginate(6);
      $user="<i>Ahmed</i>";

   	return view('library.index')->with('book',$book)->with('user',$user);
   } 


   public function show($id)
   {
   	$book=Book::findOrFail($id);
   	return view('library.show')->with('book',$book);
   }

   public function create()
   {
      $tags=Tag::all();
      $categories=Category::all();
   	return view('library.create')->with('tags',$tags)->with('categories',$categories);
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
     			$book->category_id=$request->category;
          $book->user_id=$request->user()->id;
     			$book->year=$request->input('year');
          $book->description=$request->description;

          

            //Save image file
         if($request->hasFile('book_cover'))
         {
            $image=$request->file('book_cover');
            $fileName=time() . '.' .$image->getClientOriginalExtension(); 
            $location=public_path('images/' .$fileName);
            //resize(width,height)
            Image::make($image)->resize(300,300)->save($location);
            $book->image_path=$fileName;

         }

         //Upload a File

         if($request->hasFile('upload_book'))
         {
            $file = $request->file('upload_book');
           $name=$book->title .'-'.$book->author.'-'.$book->year.'-'.'.'.$file->getClientOriginalExtension();
            Storage::disk('local')->put($name, file_get_contents($file));
            $book->mime = $file->getClientMimeType();
            $book->original_filename = $file->getClientOriginalName();
            $book->filename = $name;
             
         }
           
            /**
              *Save files
              * using the local driver which is the default driver and it will save to storage/app *directory,to change this goto config/filesystem.php and edit it....
              *Don't forget to import Storage facade
            */

             /*
               $file=request->file('input tag name');
               Storage::put($file->getClientOriginalName(),file_get_contents($file));
            */
            // to show the image, put this line in the view
            //<img src="{{asset('images/' . $book->image_path)}}"
            // asset method is used to create public url
   			$book->save();
            $book->tags()->sync($request->tags, false);
            
   			Session::flash('message','Book Added Successfully!!');
            return redirect('/library');
            }


   		}
   		public function edit($id)
         {
            $book=Book::findOrFail($id);
            $tags=Tag::all();
            $categories=Category::all();
            $this->authorize('update',$book);
            return view('library.edit',compact('book','tags','categories'));
            //route example   
            //<a href="{{ route('contacts.edit', [$contact->id]) }}">Edit This Contact</a>
         }

         public function update(Request $request,$id)
         {
            $rules=['title'=>'required','author'=>'required','year'=>'required','category'=>'required'];
            $book=Book::findOrFail($id);
            $book->tags()->detach();
            $validator=Validator::make($request->all(),$rules);

            if($validator->fails())
            {
               return redirect()->route('library.edit',$book->id)->withErrors($validator);
            }
            else
            {
                
                $book->title=$request->title;
                $book->author=$request->author;
                $book->year=$request->year;
                $book->category_id=$request->category;
                $book->description=$request->description;
                if(isset($request->book_cover))
                {
                     $image=$request->file('book_cover');
                     $name=time(). '.' .$image->getClientOriginalExtension();
                     $location=public_path('images/'.$name);
                     Image::make($image)->resize(300,300)->save($location);
                     $book->image_path=$name;
                }
                if(isset($request->upload_book))
                {
                     $file=$request->file('upload_book');
                     $name=$book->title .'-'.$book->author.'-'.$book->year.'-'.'.'.$file->getClientOriginalExtension();
                     Storage::disk('local')->put($name,file_get_contents($file));
                     $book->mime=$file->getClientMimeType();
                     $book->original_filename=$file->getClientOriginalName();
                     $book->filename=$name;

                }
                $book->save();
                $book->tags()->sync($request->tags,false);
                Session::flash('message','Updated Seccessfully!!');
                return redirect('/library');
            }
         }

         public function getBook($filename)
         {
   
            $book = Book::where('filename', '=', $filename)->firstOrFail();
            $file = Storage::disk('local')->get($book->filename);
           
               return Response($file, 200)->header('Content-Type', $book->mime);
        }


        public function destroy($id)
        {
               /* Checking Policies use Gate
                 
               if (Gate::denies('destroy', $book)) {
                   abort(403);
               } 
               */

               $book=Book::findOrFail($id);
               $this->authorize('delete',$book);
               $book->tags()->detach();
               //Delete image
               if($book->image_path != 'defbookcover.jpg')
               {
                  File::delete('images/'.$book->image_path);
               }
               
               //Delete fil
               Storage::delete($book->filename);
               $book->delete();

              Session::flash('message', 'The book was successfully deleted.');
              return redirect()->route('library.index');
            
              
            

            
        }
   }

   


