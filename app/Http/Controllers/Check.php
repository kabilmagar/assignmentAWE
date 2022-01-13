<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Check extends Controller
{
    public function index(){
        return view('check');
    }
}
