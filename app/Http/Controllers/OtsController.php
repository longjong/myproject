<?php

namespace App\Http\Controllers;

use App\Models\Ots;
use Illuminate\Http\Request;

class OtsController extends Controller
{
    public function index()
    {
        $data['otshirts'] = Ots::OrderBy('id','asc')->paginate(20);
        return view('admin.otshirts.index',$data);
    }

    public function create()
    {
        return view('admin.otshirts.create');
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

            $otshirts = new Ots;
            $otshirts->name         = $request->name;
            $otshirts->description   = $request->description;
            $otshirts->image         = $path.$imageName;
            $otshirts->price         = $request->price;
            $otshirts->is_active     = $request->is_active;
            $otshirts->save();
    
            return redirect(route('admin.otshirts.index'))->with('Success','ShirtOtop has been create successfully.');
         
    }
            public function edit(Ots $otshirts) 
            {
                return view('admin.otshirts.edit', compact('otshirts'));
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
                $otshirts = Ots::find($id);
                $otshirts->name               = $request->name;
                $otshirts->description         = $request->description;
                $otshirts->image               = $request->image;
                $otshirts->price               = $request->price;
                $otshirts->is_active           = $request->is_active;

                $otshirts->update();

                return redirect()->route('admin.otshirts.index')->with('success', 'ShirtsOtop has been updated successfully.');
            }

            public function destroy($id) 
            {
                $otshirts = Ots::find($id);
                $otshirts->delete();
                return redirect(route('admin.otshirts.index'))->with('success', 'ShirtsOtop has been deleted successfully.');
            }
}
