<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    //
    function list(){

        // get all book from db


        $books=Book::get();
        //$books=Book::select('name','desc')->get();
        //$books=Book::where('id' , '>=' ,2)->get();
        //$books=Book::select('name','desc')->where('id','>=', 2)->orderBy('id','DESC')->get();
        //dd($books);
        //return 'List of books';
        //return view('books',compact('books'));
        return view('books',[
            'Books' => $books,
        ]);
    }

    public function show($id)
    {
        $book=Book::where('id','=' ,$id)->first();
        //$book=Book::findOrFail($id);
        return view('show',compact('book'));
    }

    public function create(){

        $cates=Category::select('id','name')->get();
        return view('create',compact('cates'));
    }
    public function store(Request $request){

        //validation

        $request->validate([
            'name' =>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'image|mimes:jpeg,png',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'
        ]);

        //dd($request->all());

        //move
        $img=$request->file('image');             //bmsek el soura
        $ext=$img->getClientOriginalExtension();   //bgeb extention
        $name="book-".uniqid().".$ext";            // conncat ext +name elgded
        $img->move(public_path("uploads/books"),$name);   //elmkan , $name elgded

       $book= Book::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'image'=>$name
        ]);

        $book->categories()->sync($request->category_ids);

      return redirect(route('book.list'));
      //get return view
      //post return redirect

    }

    public function edit($id)
    {

        $book=Book::findOrFail($id);
        return view('edit',compact('book'));
    }

    public function update(Request $request ,$id){

        //validation
        $request->validate([
            'name' =>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'image|mimes:jpeg,png'
        ]);

        $book=Book::findOrFail($id);
        $name=$book->image;

        if ($request->hasFile('image'))
        {
            if($name !== null)
            {
                unlink(public_path('uploads/books/'.$name));
            }
            //move
        $img=$request->file('image');             //bmsek el soura
        $ext=$img->getClientOriginalExtension();   //bgeb extention
        $name="book-".uniqid().".$ext";            // conncat ext +name elgded
        $img->move(public_path("uploads/books"),$name);   //elmkan , $name elgded
        }
        $book->update([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'image'=>$name
        ]);

        return redirect(route('book.edit',$id));
    }
    public function delete($id)
    {
        $book=Book::findOrFail($id);
        if ($book->image !== null){

        unlink(public_path('uploads/books/').$book->image);

        }

        $book->delete();

        return redirect(route('book.list'));
    }


}
