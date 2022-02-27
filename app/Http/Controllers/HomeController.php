<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return Inertia::render('Home',[
            'rooms' =>$rooms,
            'user' => Auth::user(),
        ]);
    }
}
