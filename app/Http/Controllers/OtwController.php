<?php

namespace App\Http\Controllers;

use App\Models\Otw;
use Illuminate\Http\Request;

class OtwController extends Controller
{
    public function index()
    {
        $data['otwaters'] = Otw::OrderBy('id','asc')->paginate(20);
        return view('admin.otwaters.index',$data);
    }

    public function create()
    {
        return view('admin.otwaters.create');
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

            $otwaters = new Otw;
            $otwaters->name         = $request->name;
            $otwaters->description   = $request->description;
            $otwaters->image         = $path.$imageName;
            $otwaters->price         = $request->price;
            $otwaters->is_active     = $request->is_active;
            $otwaters->save();
    
            return redirect(route('admin.otwaters.index'))->with('Success','WaterOtop has been create successfully.');
         
    }
            public function edit(Otw $otwaters) 
            {
                return view('admin.otwaters.edit', compact('otwaters'));
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
                $otwaters = Otw::find($id);
                $otwaters->name               = $request->name;
                $otwaters->description         = $request->description;
                $otwaters->image               = $request->image;
                $otwaters->price               = $request->price;
                $otwaters->is_active           = $request->is_active;

                $otwaters->update();

                return redirect()->route('admin.otwaters.index')->with('success', 'WaterOtop has been updated successfully.');
            }

            public function destroy($id) 
            {
                $otwaters = Otw::find($id);
                $otwaters->delete();
                return redirect(route('admin.otwaters.index'))->with('success', 'WaterOtop has been deleted successfully.');
            }
}
