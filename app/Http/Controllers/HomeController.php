<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSend;
use Illuminate\Support\Facades\Mail;
use App\Models\Book;
use App\Models\Cd;
use App\Models\Game;

class HomeController extends Controller
{
    public function index(){
        $books=Book::orderBy('id','desc')->get();
        $cds=Cd::orderBy('id','desc')->get();
        $games=Game::orderBy('id','desc')->get();
        return view('home',compact('books','cds','games'));
    }

    public function sendMail(Request $request){
        $request->validate([
            'email'=>['required','email']
        ]);
        if($request->email){
            Mail::to($request->email)->send(new EmailSend());
            session()->flash('message');
            return redirect()->back();
        }
        
    }
}
