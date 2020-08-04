<?php

namespace App\Events;
use App\Models\Appraisal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SupervisorAppraised
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $appraisal;

    /**
     * Create a new event instance.
     *
     * @param Appraisal $appraisal
     */
    public function __construct(Appraisal $appraisal)
    {
        //
        $this->appraisal = $appraisal;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
