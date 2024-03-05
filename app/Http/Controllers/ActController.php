<?php

namespace App\Http\Controllers;
use App\Models\Act;
use Illuminate\Http\Request;


class ActController extends Controller
{
    public function index()
    {
        $event = Act::all();
        
        return view('event')->with(array('event'=>$event));

       
    }
    
}
 