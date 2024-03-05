<?php

namespace App\Http\Controllers;

use App\Models\Userss;
use Illuminate\Http\Request;

class UserssController extends Controller
{
    public function index()
    {
        $data ['userss'] = Userss::OrderBy('id','asc')->paginate(50);
        return view('admin.userss.index',$data);
    }

    // public function store(Request $request)
    // {
    //         $request->validate([
                
    //             'username'=>'required',
    //             'full_name'=>'required',
    //             'telephone'=>'required',
    //             'email'=>'required',
    //             'address'=>'required',
    //             'image'=>'required',
    //             'is_active'=>'required'
    //         ]);
       
    //         $imageName = time().'.'.request()->image->getClientOriginalExtension();
    //         $path = '/data/upload/'.date("Y").'/image/';
    //         request()->image->move(public_path($path), $imageName);

    //         $userss = new Userss;
    //         $userss->username         = $request->username;
    //         $userss->full_name   = $request->full_name;
    //         $userss->telephone   = $request->telephone;
    //         $userss->map   = $request->map;
    //         $userss->address   = $request->address;
    //         $userss->image         = $path.$imageName;
    //         $userss->is_active     = $request->is_active;
    //         $userss->save();
    
    //         return redirect(route('admin.userss.index'))->with('Success','User has been created successfully.');
         
    // }
            public function edit(Userss $userss) 
            {
                return view('admin.userss.edit', compact('userss'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'username' => 'required',
                    'full_name' => 'required',
                    'telephone' => 'required',
                    'email' => 'required',
                    'address' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $userss = Userss::find($id);
                $userss->username                = $request->username;
                $userss->full_name             = $request->full_name;
                $userss->telephone           = $request->telephone;
                $userss->map                 = $request->map;
                $userss->address              = $request->address;
                $userss->image               = $request->image;
                $userss->is_active           = $request->is_active;

                $userss->update();

                return redirect()->route('admin.userss.index')->with('success', 'User has been updated successfully.');
            }

            public function destroy($id) 
            {
                $userss = Userss::find($id);
                $userss->delete();
                return redirect(route('admin.userss.index'))->with('success', 'User has been deleted successfully.');
            }
}
