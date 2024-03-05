<?php

namespace App\Http\Controllers;

use App\Models\Halal;
use Illuminate\Http\Request;

class HalalController extends Controller
{
    public function index()
    {
        $data ['halals'] = Halal::OrderBy('id','asc')->paginate(5);
        return view('admin.halals.index',$data);
    }

    public function create()
    {
        return view('admin.halals.create');
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

            $halals = new Halal;
            $halals->name         = $request->name;
            $halals->address   = $request->address;
            $halals->telephone   = $request->telephone;
            $halals->map   = $request->map;
            $halals->rating   = $request->rating;
            $halals->image         = $path.$imageName;
            $halals->is_active     = $request->is_active;
            $halals->save();
    
            return redirect(route('admin.halals.index'))->with('Success','Restaurant Halal has been created successfully.');
         
    }
            public function edit(Halal $halals) 
            {
                return view('admin.halals.edit', compact('halals'));
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
                $halals = Halal::find($id);
                $halals->name                = $request->name;
                $halals->address             = $request->address;
                $halals->telephone           = $request->telephone;
                $halals->map                 = $request->map;
                $halals->rating              = $request->rating;
                $halals->image               = $request->image;
                $halals->is_active           = $request->is_active;

                $halals->update();

                return redirect()->route('admin.halals.index')->with('success', 'Restaurant Halal has been updated successfully.');
            }

            public function destroy($id) 
            {
                $halals = Halal::find($id);
                $halals->delete();
                return redirect(route('admin.halals.index'))->with('success', 'Restaurant Halal has been deleted successfully.');
            }
}
