<?php

namespace App\Http\Controllers;

use App\Models\Otd;
use Illuminate\Http\Request;

class OtdController extends Controller
{
    public function index()
    {
        $data['otdecos'] = Otd::OrderBy('id','asc')->paginate(20);
        return view('admin.otdecos.index',$data);
    }

    public function create()
    {
        return view('admin.otdecos.create');
    }
    public function store(Request $request)
    {
            $request->validate([
                
                'name'=>'required',
                'description'=>'required',
                'image'=>'required',
                'price'=>'required',
                'is_active'=>'required'
            ]);
       
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $path = '/data/upload/'.date("Y").'/image/';
            request()->image->move(public_path($path), $imageName);

            $otdecos = new Otd;
            $otdecos->name         = $request->name;
            $otdecos->description   = $request->description;
            $otdecos->image         = $path.$imageName;
            $otdecos->price         = $request->price;
            $otdecos->is_active     = $request->is_active;
            $otdecos->save();
    
            return redirect(route('admin.otdecos.index'))->with('Success','Decoration has been create successfully.');
         
    }
            public function edit(Otd $otdecos) 
            {
                return view('admin.otdecos.edit', compact('otdecos'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'price' => 'required',
                    'is_active'=>'required'
                ]);
                $otdecos = Otd::find($id);
                $otdecos->name               = $request->name;
                $otdecos->description         = $request->description;
                $otdecos->image               = $request->image;
                $otdecos->price               = $request->price;
                $otdecos->is_active           = $request->is_active;

                $otdecos->update();

                return redirect()->route('admin.otdecos.index')->with('success', 'Decoration has been updated successfully.');
            }

            public function destroy($id) 
            {
                $otdecos = Otd::find($id);
                $otdecos->delete();
                return redirect(route('admin.otdecos.index'))->with('success', 'Decoration has been deleted successfully.');
            }
}
