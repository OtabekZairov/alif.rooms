<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('myroom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*    public function show($id)
    {
        
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('myroom', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $room = Room::find($id);
              $room->update([       
                'started_at'=> $request->input('start'),
                'ends_in'=> $request->input('end'),
                'is_busy' => 1,
                'username' => $request->input('name'),
                'comment' => $request->input('body'),
            ]);
              Booking::create([
                'room_id' => $id,
                'started_at'=> $request->input('start'),
                'ends_in'=> $request->input('end'),
                'is_busy' => 1,
                'username' => $request->input('name'),
                'comment' => $request->input('body'),
                ]); 

            
         return redirect()->route('home');
             
    }

    public function free(Request $request, $id)
    {
        $room = Room::find($id);
        $room->update([
                'started_at'=> '',
                'end s_in'=> '',
                'is_busy' => 0,
                'username' => '',
                'comment' => '',
            ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        //
        
    }
}
