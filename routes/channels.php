<?php

use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('room.{roomId}', function ($user, $roomId) {
    if($user){
        return [
            'user' => $user->toArray(),
        ];
    }     

    return false;
});

// Broadcast::channel('trigger', function () {
//     return true;
// });
