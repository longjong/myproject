<?php

namespace App\Http\Controllers;

use App\Models\Otf;
use Illuminate\Http\Request;

class OtfController extends Controller
{
    public function index()
    {
        $data['otfoods'] = Otf::OrderBy('id','asc')->paginate(20);
        return view('admin.otfoods.index',$data);
    }

    public function create()
    {
        return view('admin.otfoods.create');
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

            $otfoods = new Otf;
            $otfoods->name         = $request->name;
            $otfoods->description   = $request->description;
            $otfoods->image         = $path.$imageName;
            $otfoods->price         = $request->price;
            $otfoods->is_active     = $request->is_active;
            $otfoods->save();
    
            return redirect(route('admin.otfoods.index'))->with('Success','FoodsOtop has been create successfully.');
         
    }
            public function edit(Otf $otfoods) 
            {
                return view('admin.otfoods.edit', compact('otfoods'));
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
                $otfoods = Otf::find($id);
                $otfoods->name               = $request->name;
                $otfoods->description         = $request->description;
                $otfoods->image               = $request->image;
                $otfoods->price               = $request->price;
                $otfoods->is_active           = $request->is_active;

                $otfoods->update();

                return redirect()->route('admin.otfoods.index')->with('success', 'FoodsOtop has been updated successfully.');
            }

            public function destroy($id) 
            {
                $otfoods = Otf::find($id);
                $otfoods->delete();
                return redirect(route('admin.otfoods.index'))->with('success', 'FoodOtop has been deleted successfully.');
            }
}
