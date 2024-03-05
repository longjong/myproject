<?php

namespace App\Http\Controllers;

use App\Models\Taxi;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    public function index()
    {
        $data ['taxies'] = Taxi::OrderBy('id','asc')->paginate(20);
        return view('admin.taxies.index',$data);
    }

    public function create()
    {
        return view('admin.taxies.create');
    }
    public function store(Request $request)
    {
            $request->validate([
                
                'name'=>'required',
                'telephone'=>'required',
                'image'=>'required',
                'is_active'=>'required'
            ]);
       
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $path = '/data/upload/'.date("Y").'/image/';
            request()->image->move(public_path($path), $imageName);

            $taxies = new Taxi;
            $taxies->name         = $request->name;
            $taxies->telephone   = $request->telephone;
            $taxies->image         = $path.$imageName;
            $taxies->is_active     = $request->is_active;
            $taxies->save();
    
            return redirect(route('admin.taxies.index'))->with('Success','Taxi Stations has been created successfully.');
         
    }
            public function edit(Taxi $taxies) 
            {
                return view('admin.taxies.edit', compact('taxies'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'name' => 'required',
                    'telephone' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $taxies = Taxi::find($id);
                $taxies->name                = $request->name;
                $taxies->telephone           = $request->telephone;
                $taxies->image               = $request->image;
                $taxies->is_active           = $request->is_active;

                $taxies->update();

                return redirect()->route('admin.taxies.index')->with('success', 'Taxi Stations has been updated successfully.');
            }

            public function destroy($id) 
            {
                $taxies = Taxi::find($id);
                $taxies->delete();
                return redirect(route('admin.taxies.index'))->with('success', 'Taxi Stations has been deleted successfully.');
            }
}
