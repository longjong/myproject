<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $data['events'] = Event::OrderBy('id','asc')->paginate(20);
        return view('admin.events.index',$data);
    }

    public function create()
    {
        return view('admin.events.create');
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

            $events = new Event;
            $events->title         = $request->title;
            $events->description   = $request->description;
            $events->image         = $path.$imageName;
            $events->is_active     = $request->is_active;
            $events->save();
    
            return redirect(route('admin.events.index'))->with('Success','Event has been create successfully.');
         
    }
            public function edit(Event $events) 
            {
                return view('admin.events.edit', compact('events'));
            }

            public function update(Request $request, $id)
             {
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'is_active'=>'required'
                ]);
                $events = Event::find($id);
                $events->title               = $request->title;
                $events->description         = $request->description;
                $events->image               = $request->image;
                $events->is_active           = $request->is_active;

                $events->update();

                return redirect()->route('admin.events.index')->with('success', 'Event has been updated successfully.');
            }

            public function destroy($id) 
            {
                $events = Event::find($id);
                $events->delete();
                return redirect(route('admin.events.index'))->with('success', 'Event has been deleted successfully.');
            }
}
