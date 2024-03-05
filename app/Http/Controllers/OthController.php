<?php

namespace App\Http\Controllers;

use App\Models\Oth;
use Illuminate\Http\Request;

class OthController extends Controller
{
    public function index()
    {
        $data['otherbs'] = Oth::OrderBy('id','asc')->paginate(20);
        return view('admin.otherbs.index',$data);
    }

    public function create()
    {
        return view('admin.otherbs.create');
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

            $otherbs = new Oth;
            $otherbs->name         = $request->name;
            $otherbs->description   = $request->description;
            $otherbs->image         = $path.$imageName;
            $otherbs->price         = $request->price;
            $otherbs->is_active     = $request->is_active;
            $otherbs->save();
    
            return redirect(route('admin.otherbs.index'))->with('Success','Herbs has been create successfully.');
         
    }
            public function edit(Oth $otherbs) 
            {
                return view('admin.otherbs.edit', compact('otherbs'));
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
                $otherbs = Oth::find($id);
                $otherbs->name               = $request->name;
                $otherbs->description         = $request->description;
                $otherbs->image               = $request->image;
                $otherbs->price               = $request->price;
                $otherbs->is_active           = $request->is_active;

                $otherbs->update();

                return redirect()->route('admin.otherbs.index')->with('success', 'Herbs has been updated successfully.');
            }

            public function destroy($id) 
            {
                $otherbs = Oth::find($id);
                $otherbs->delete();
                return redirect(route('admin.otherbs.index'))->with('success', 'Herbs has been deleted successfully.');
            }
}
