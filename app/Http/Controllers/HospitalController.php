<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $data ['hospitals'] = Hospital::OrderBy('id','asc')->paginate(20);
        return view('admin.hospitals.index',$data);
    }

    public function create()
    {
        return view('admin.hospitals.create');
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

            $hospitals = new Hospital;
            $hospitals->name         = $request->name;
            $hospitals->address   = $request->address;
            $hospitals->telephone   = $request->telephone;
            $hospitals->map   = $request->map;
            $hospitals->image         = $path.$imageName;
            $hospitals->is_active     = $request->is_active;
            $hospitals->save();
    
            return redirect(route('admin.hospitals.index'))->with('Success','Hospital Stations has been created successfully.');
         
    }
            public function edit(Hospital $hospitals) 
            {
                return view('admin.hospitals.edit', compact('hospitals'));
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
                $hospitals = Hospital::find($id);
                $hospitals->name                = $request->name;
                $hospitals->address             = $request->address;
                $hospitals->telephone           = $request->telephone;
                $hospitals->map                 = $request->map;
                $hospitals->image               = $request->image;
                $hospitals->is_active           = $request->is_active;

                $hospitals->update();

                return redirect()->route('admin.hospitals.index')->with('success', 'Hospital Stations has been updated successfully.');
            }

            public function destroy($id) 
            {
                $hospitals = Hospital::find($id);
                $hospitals->delete();
                return redirect(route('admin.hospitals.index'))->with('success', 'Hospital Stations has been deleted successfully.');
            }
}
