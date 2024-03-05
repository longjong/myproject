<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Restaurant,Userss};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
       
       return view('home');
   
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $usersss = Userss::OrderBy('id','asc')->paginate(20);
        return view('admin.Home')->with(array('usersss'=>$usersss));
    }
}
   