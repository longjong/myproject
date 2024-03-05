<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $data['busss'] = Bus::OrderBy('id','asc')->paginate(20);
        return view('admin.busss.index',$data);
    }

    public function create()
    {
        return view('admin.busss.create');
    }
    public function store(Request $request)
    {
            $request->validate([
                
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'is_active'=>'required'
            ]);
       
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $path = '/data/upload/'.date("Y").'/image/';
            request()->image->move(public_path($path), $imageName);

            $busss = new Bus;
            $busss->title         = $request->title;
            $busss->description   = $request->description;
            $busss->image         = $path.$imageName;
            $busss->is_active     = $request->is_active;
            $busss->save();
    
            return redirect(route('admin.busss.index'))->with('Success','Bus has been create successfully.');
         
    }
            public function edit(Bus $busss) 
            {
                return view('admin.busss.edit', compact('busss'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $busss = Bus::find($id);
                $busss->title               = $request->title;
                $busss->description         = $request->description;
                $busss->image               = $request->image;
                $busss->is_active           = $request->is_active;

                $busss->update();

                return redirect()->route('admin.busss.index')->with('success', 'Bus has been updated successfully.');
            }

            public function destroy($id) 
            {
                $busss = Bus::find($id);
                $busss->delete();
                return redirect(route('admin.busss.index'))->with('success', 'Bus has been deleted successfully.');
            }
}
