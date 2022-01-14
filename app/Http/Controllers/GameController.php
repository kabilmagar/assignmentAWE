<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index($id=null){
        if($id){
            $game_details=Game::findOrFail($id);
        }else{
            $game_details=[];
        }
        
        return view('game',compact('game_details'));
    }

    // it is used to update or insert the data in cd
    public function save(Request $request){
        // for server side validation 
        $request->validate([
            'console'=>['required','string','max:255'],
            'title'=>['required','string','max:255'],
            'pegi'=>['required','numeric'],
            'price'=> ['required','numeric'],
            'url'=>['nullable']
        ]);
        Game::updateOrCreate(['id'=>$request->id],[
            'console'=>$request->console,
            'title'=>$request->title,
            'pegi'=>$request->pegi,
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

    public function viewGameTable(){
        $details=Game::orderBy('id','desc')->paginate(5);
        return view('game-table',compact('details'));
    }

    public function deleteGame(Request $request){
        Game::destroy($request->id);
        return redirect()->back()->with('message', 'Deleted Successfully'); 
    }
}
