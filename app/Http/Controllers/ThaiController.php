<?php

namespace App\Http\Controllers;

use App\Models\Thai;
use Illuminate\Http\Request;

class ThaiController extends Controller
{
    public function index()
    {
        $data ['thais'] = Thai::OrderBy('id','asc')->paginate(5);
        return view('admin.thais.index',$data);
    }

    public function create()
    {
        return view('admin.thais.create');
    }
    public function store(Request $request)
    {
            $request->validate([
                
                'name'=>'required',
                'address'=>'required',
                'telephone'=>'required',
                'map'=>'required',
                'rating'=>'required',
                'image'=>'required',
                'is_active'=>'required'
            ]);
       
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $path = '/data/upload/'.date("Y").'/image/';
            request()->image->move(public_path($path), $imageName);

            $thais = new Thai;
            $thais->name         = $request->name;
            $thais->address   = $request->address;
            $thais->telephone   = $request->telephone;
            $thais->map   = $request->map;
            $thais->rating   = $request->rating;
            $thais->image         = $path.$imageName;
            $thais->is_active     = $request->is_active;
            $thais->save();
    
            return redirect(route('admin.thais.index'))->with('Success','Restaurant Thai has been created successfully.');
         
    }
            public function edit(Thai $thais) 
            {
                return view('admin.thais.edit', compact('thais'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'name' => 'required',
                    'address' => 'required',
                    'telephone' => 'required',
                    'map' => 'required',
                    'rating' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $thais = Thai::find($id);
                $thais->name                = $request->name;
                $thais->address             = $request->address;
                $thais->telephone           = $request->telephone;
                $thais->map                 = $request->map;
                $thais->rating              = $request->rating;
                $thais->image               = $request->image;
                $thais->is_active           = $request->is_active;

                $thais->update();

                return redirect()->route('admin.thais.index')->with('success', 'Restaurant Thai has been updated successfully.');
            }

            public function destroy($id) 
            {
                $thais = Thai::find($id);
                $thais->delete();
                return redirect(route('admin.thais.index'))->with('success', 'Restaurant Thai has been deleted successfully.');
            }
}
