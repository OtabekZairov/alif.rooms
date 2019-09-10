<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Room;
use DB;

class RoomsController extends Controller
{
    public function index()
    {
       return view('admin.room');
    }

    public function store(Request $request){

        //dd($request->all());
        $file = $request->file('image');
        if($file <> 0) {
           $name = time() . "_" . md5($file->getFilename()) . "." . $file->extension();
            $file->move(public_path('images'), $name);
            $src = asset("images/" . $name);
             Room::create([    
                'avatar' => $src,
                'title'  => $request->input('title'),
                'description' => $request->input('textarea'),        
            ]);              
        } else {
            Room::create([    
                'title'  => $request->input('title'),
                'description' => $request->input('textarea'),
                
                
            ]);  
        }   
        return redirect()->route('home');

    }



    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.edit', compact('room'));
    } 

    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $room = Room::find($id);
        if($file <> 0) {
           $name = time() . "_" . md5($file->getFilename()) . "." . $file->extension();
            $file->move(public_path('images'), $name);
            $src = asset("images/" . $name);
             $room->update([    
                'avatar' => $src,
                'room_name'  => $request->input('title'),
                'description' => $request->input('textarea'),
             
                
            ]);              
        } else {
            $room->update([    
                'room_name'  => $request->input('title'),
                'description' => $request->input('textarea'),
            ]);  
        }   
        return redirect()->route('admin.admin');
    }

    /*public function free($id)

    {
        //dd($request->all());
        $room = Room::find($id);
        $room->update([
            'room_id' => ' ',
            'started_at'=> ' ',
            'ends_in'=>' ',
            'is_busy' => 0,
            'username' => ' ',
            'comment' => ' ',
            ]);
        return back();
    }*/

    public function delete($id)
    {
        
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('home');   
    }
   
}
