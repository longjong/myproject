<?php

namespace App\Http\Controllers;

use App\Models\China;
use Illuminate\Http\Request;

class ChinaController extends Controller
{
    public function index()
    {
        $data ['chinas'] = China::OrderBy('id','asc')->paginate(5);
        return view('admin.chinas.index',$data);
    }

    public function create()
    {
        return view('admin.chinas.create');
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

            $chinas = new China;
            $chinas->name         = $request->name;
            $chinas->address   = $request->address;
            $chinas->telephone   = $request->telephone;
            $chinas->map   = $request->map;
            $chinas->rating   = $request->rating;
            $chinas->image         = $path.$imageName;
            $chinas->is_active     = $request->is_active;
            $chinas->save();
    
            return redirect(route('admin.chinas.index'))->with('Success','Restaurant China has been created successfully.');
         
    }
            public function edit(China $chinas) 
            {
                return view('admin.chinas.edit', compact('chinas'));
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
                $chinas = China::find($id);
                $chinas->name                = $request->name;
                $chinas->address             = $request->address;
                $chinas->telephone           = $request->telephone;
                $chinas->map                 = $request->map;
                $chinas->rating              = $request->rating;
                $chinas->image               = $request->image;
                $chinas->is_active           = $request->is_active;

                $chinas->update();

                return redirect()->route('admin.chinas.index')->with('success', 'Restaurant China has been updated successfully.');
            }

            public function destroy($id) 
            {
                $chinas = China::find($id);
                $chinas->delete();
                return redirect(route('admin.chinas.index'))->with('success', 'Restaurant China has been deleted successfully.');
            }
}
