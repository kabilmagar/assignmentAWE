<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cd;

class CDController extends Controller
{
    // it displays the cd form
    public function index($id=null){
        if($id){
            $cd_details=Cd::findOrFail($id);
        }else{
            $cd_details=[];
        }
        
        return view('cd',compact('cd_details'));
    }

    // it is used to update or insert the data in cd
    public function save(Request $request){
        // for server side validation 
        $request->validate([
            'artist'=>['required','string','max:255'],
            'name'=>['required','string','max:255'],
            'duration'=>['required','numeric'],
            'price'=> ['required','numeric'],
            'url'=>['nullable']
        ]);
        Cd::updateOrCreate(['id'=>$request->id],[
            'artist'=>$request->artist,
            'name'=>$request->name,
            'duration'=>$request->duration,
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

    public function viewCdTable(){
        $details=Cd::orderBy('id','desc')->paginate(5);
        return view('cd-table',compact('details'));
    }

    public function deleteCd(Request $request){
        Cd::destroy($request->id);
        return redirect()->back()->with('message', 'Deleted Successfully'); 
    }


}
