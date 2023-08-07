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
    public $last_bid;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, Product $product, Session $session, int $last_bid)
    {
        $this->user = $user;
        $this->product = $product;
        $this->session = $session;
        $this->last_bid = $last_bid;
    }


    // Channel name
    public function broadcastOn()
    {
        return new Channel('bid-sent-' . $this->product->id);
    }

    // Event name
    public function broadcastAs()
    {
        return 'bid-sent-' . $this->product->id;
    }

    // Event data
    public function broadcastWith()
    {
        return [
            // 'user' => $this->user,
            // 'product' => $this->product,
            'last_uid' => $this->user->id,
            'last_bid' => $this->last_bid,
        ];
    }
}
