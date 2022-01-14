<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index($id=null){
        if($id){
            $book_details=Book::findOrFail($id);
        }else{
            $book_details=[];
        }
        
        return view('book',compact('book_details'));
    }

    // it is used to update or insert the data in cd
    public function save(Request $request){
        // for server side validation 
        $request->validate([
            'author'=>['required','string','max:255'],
            'title'=>['required','string','max:255'],
            'page'=>['required','numeric'],
            'price'=> ['required','numeric'],
            'url'=>['nullable']
        ]);
        Book::updateOrCreate(['id'=>$request->id],[
            'author'=>$request->author,
            'title'=>$request->title,
            'page'=>$request->page,
            'price'=>$request->price,
            'url'=>$request->url,
            'description'=>$request->description
        ]);
        
        if($request->id){
            return redirect()->back()->with('message', 'Updated Successfully');   
        }else{
            return redirect()->back()->with('message', 'Inserted Successfully');  
        }
    }

    public function viewBookTable(){
        $details=Book::orderBy('id','desc')->paginate(5);
        return view('book-table',compact('details'));
    }

    public function deleteBook(Request $request){
        Book::destroy($request->id);
        return redirect()->back()->with('message', 'Deleted Successfully'); 
    }
}
