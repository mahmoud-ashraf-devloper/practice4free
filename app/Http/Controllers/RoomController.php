<?php

namespace App\Http\Controllers;

use App\Events\UserJoined;
use App\Events\UserLeft;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function returnRoomUsers($roomId)
    {
        return response(RoomUser::where('room_id', $roomId)->get()->pluck('user_id')->toArray()); 
    }

    public function index(Room $roomId)
    {
        $room = Room::find($roomId)->load(['owner'])->first();
        return Inertia::render('Room',[
                'user' => auth()->user(),
                'room' => $room,
                'roommates' => RoomUser::where('room_id', $room->id)->get(),
        ]);
    }

    public function create(Request $request)
    {
        // adding rules
        $roomData = $request->validate([
            'title' => [],
            'topic' => [],
            'size' => [],
            'language_id'=>[]
        ], $request->all());

        $roomData = Arr::add($roomData, 'id' ,uniqid());
        $roomData = Arr::add($roomData, 'owner_id' ,auth()->id());

        Room::create($roomData);
        // check if language is exists in languages table

        // fire newRoomAdded event to broadcast it to the home page

        // fire Room created event to make new channel
    }


    public function joinRoom($room, $user)
    {        
        RoomUser::updateOrCreate([
            'user_id' => $user,
            'room_id' => $room,
        ]);
        // should have a check if the user is registered in the data base

        //emit an event user-joined
        broadcast(new UserJoined(Room::find($room)->first(), User::find($user)->first()));
        return true;
    }

    public function left($roomId, $userId)
    {
        $roomUser = RoomUser::find($userId);
        $room = Room::find($roomId);

        if($roomUser != null){
            if($roomUser->delete()){
                broadcast(new UserLeft(auth()->user(),$room))->toOthers();
                return response($userId.'user left', Response::HTTP_ACCEPTED);
            }
        }
    }
}
