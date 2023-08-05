<?php

namespace App\Events;

use App\Models\Product;
use App\Models\Session;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $product;
    public $session;

    /**
     * Create a new event instance.
     */
    public function __construct(string $user, string $product, $session)
    {
        $this->user = $user;
        $this->product = $product;
        $this->session = $session;
    }

    public function broadcastOn()
    {
        return new Channel('bid-sent');
    }


    public function broadcastAs()
    {
        return 'bid-sent';
    }

    public function broadcastWith()
    {
        return [
            'last_bid' => 33333,
        ];
    }




}
