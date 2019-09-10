<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blank()
    {
        $rooms = Room::paginate(4);
        return view('home', compact('rooms'));
    }

    public function index()
    {
        $rooms = Room::with('booking')->paginate(4);
        return view('home', compact('rooms'));
    }

    public function admin()
    {
        $rooms = Room::with('booking')->paginate(4);
        return view('admin.admin', compact('rooms'));
    }

    
}

