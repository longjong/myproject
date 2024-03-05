<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $data ['feeds'] = Feed::OrderBy('id','asc')->paginate(20);
        return view('admin.feeds.index',$data);
    }

    public function create()
    {
        return view('admin.feeds.create');
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

            $feeds = new Feed;
            $feeds->title         = $request->title;
            $feeds->description   = $request->description;
            $feeds->image         = $path.$imageName;
            $feeds->is_active     = $request->is_active;
            $feeds->save();
    
            return redirect(route('admin.feeds.index'))->with('Success','Feed has been create successfully.');
         
    }
            public function edit(Feed $feeds) 
            {
                return view('admin.feeds.edit', compact('feeds'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $feeds = Feed::find($id);
                $feeds->title               = $request->title;
                $feeds->description         = $request->description;
                $feeds->image               = $request->image;
                $feeds->is_active           = $request->is_active;

                $feeds->update();

                return redirect()->route('admin.feeds.index')->with('success', 'Feed has been updated successfully.');
            }

            public function destroy($id) 
            {
                $feeds = Feed::find($id);
                $feeds->delete();
                return redirect(route('admin.feeds.index'))->with('success', 'Feed has been deleted successfully.');
            }
}