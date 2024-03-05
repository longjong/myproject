<?php

namespace App\Http\Controllers;

use App\Models\Police;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    public function index()
    {
        $data ['postations'] = Police::OrderBy('id','asc')->paginate(20);
        return view('admin.postations.index',$data);
    }

    public function create()
    {
        return view('admin.postations.create');
    }
    public function store(Request $request)
    {
            $request->validate([
                
                'name'=>'required',
                'address'=>'required',
                'telephone'=>'required',
                'map'=>'required',
                'image'=>'required',
                'is_active'=>'required'
            ]);
       
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $path = '/data/upload/'.date("Y").'/image/';
            request()->image->move(public_path($path), $imageName);

            $postations = new Police;
            $postations->name         = $request->name;
            $postations->address   = $request->address;
            $postations->telephone   = $request->telephone;
            $postations->map   = $request->map;
            $postations->image         = $path.$imageName;
            $postations->is_active     = $request->is_active;
            $postations->save();
    
            return redirect(route('admin.postations.index'))->with('Success','Police Stations has been created successfully.');
         
    }
            public function edit(Police $postations) 
            {
                return view('admin.postations.edit', compact('postations'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'name' => 'required',
                    'address' => 'required',
                    'telephone' => 'required',
                    'map' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $postations = Police::find($id);
                $postations->name                = $request->name;
                $postations->address             = $request->address;
                $postations->telephone           = $request->telephone;
                $postations->map                 = $request->map;
                $postations->image               = $request->image;
                $postations->is_active           = $request->is_active;

                $postations->update();

                return redirect()->route('admin.postations.index')->with('success', 'Police Stations has been updated successfully.');
            }

            public function destroy($id) 
            {
                $postations = Police::find($id);
                $postations->delete();
                return redirect(route('admin.postations.index'))->with('success', 'Police Stations has been deleted successfully.');
            }
}
