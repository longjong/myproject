<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $data ['banners'] = Banner::OrderBy('id','asc')->paginate(20);
        return view('admin.banners.index',$data);
    }

    public function create()
    {
        return view('admin.banners.create');
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

            $banners = new Banner;
            $banners->title         = $request->title;
            $banners->description   = $request->description;
            $banners->image         = $path.$imageName;
            $banners->is_active     = $request->is_active;
            $banners->save();
    
            return redirect(route('admin.banners.index'))->with('Success','Banner has been created successfully.');
         
    }
            public function edit(Banner $banners) 
            {
                return view('admin.banners.edit', compact('banners'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $banners = Banner::find($id);
                $banners->title               = $request->title;
                $banners->description         = $request->description;
                $banners->image               = $request->image;
                $banners->is_active           = $request->is_active;

                $banners->update();

                return redirect()->route('admin.banners.index')->with('success', 'Banner has been updated successfully.');
            }

            public function destroy($id) 
            {
                $banners = Banner::find($id);
                $banners->delete();
                return redirect(route('admin.banners.index'))->with('success', 'Banner has been deleted successfully.');
            }

                        // Banner model
            // Controller (BannerController.php)
            public function showBanner()
            {
                $banners = Banner::first(); // Adjust query as needed
                return view('banner', compact('banners'));
            }

            
}
