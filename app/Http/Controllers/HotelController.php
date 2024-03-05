<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $data['hotels'] = Hotel::OrderBy('id','asc')->paginate(20);
        return view('admin.hotels.index',$data);
    }

    public function create()
    {
        return view('admin.hotels.create');
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

            $hotels = new Hotel;
            $hotels->name         = $request->name;
            $hotels->address   = $request->address;
            $hotels->telephone   = $request->telephone;
            $hotels->map   = $request->map;
            $hotels->rating   = $request->rating;
            $hotels->image         = $path.$imageName;
            $hotels->is_active     = $request->is_active;
            $hotels->save();
    
            return redirect(route('admin.hotels.index'))->with('Success','Hotel has been create successfully.');
         
    }
            public function edit(Hotel $hotels) 
            {
                return view('admin.hotels.edit', compact('hotels'));
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
                $hotels = Hotel::find($id);
                $hotels->name               = $request->name;
                $hotels->address         = $request->address;
                $hotels->telephone         = $request->telephone;
                $hotels->map         = $request->map;
                $hotels->rating         = $request->rating;
                $hotels->image               = $request->image;
                $hotels->is_active           = $request->is_active;

                $hotels->update();

                return redirect()->route('admin.hotels.index')->with('success', 'Hotel has been updated successfully.');
            }

            public function destroy($id) 
            {
                $hotels = Hotel::find($id);
                $hotels->delete();
                return redirect(route('admin.hotels.index'))->with('success', 'Hotel has been deleted successfully.');
            }
}
