<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessageEvents implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $messages;
    /**
     * Create a new event instance.
     */
    public function __construct($messages)
    {
        $this->messages = $messages;
    }


    public function broadcastWith(){
        return [
            'message' => $this->messages
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat.'.$this->messages->id_receive),
        ];
    }
}
