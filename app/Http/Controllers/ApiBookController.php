<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    //
    public function index()
    {
        $books=Book::get();
        return response()->json($books);
    }

    public function show($id)
    {
        $book=Book::with('categories')->findOrFail($id);
        return response()->json($book);

    }

    public function store(Request $request)
    {
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

      $success='successfully created book';

      return response()->json($success);


    }


    //update
    public function update($id ,Request $request)
    {
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


        $success='successfully updated book';

        return response()->json($success);


    }


    //delete book
    public function delete($id)
    {
        $book=Book::findOrFail($id);
        if ($book->image !== null){

        unlink(public_path('uploads/books/').$book->image);

        }

        $book->categories()->sync([]);

        $book->delete();


        $success='successfully deleted book';

        return response()->json($success);
    }


}
