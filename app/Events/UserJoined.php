<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserJoined implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $room;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($room, $user)
    {
        $this->user = $user;
        $this->room = $room;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room.'. $this->room->id);
    }

    // /**
    //  * Get the data to broadcast.
    //  *
    //  * @return array
    //  */
    // public function broadcastWith()
    // {
    //     return ['user' => $this->user];
    // }
}
