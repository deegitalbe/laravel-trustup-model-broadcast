<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Deegitalbe\LaravelTrustupModelBroadcast\Contracts\Models\IsTrustupBroadcastModelContract;
 
class TrustupBroadcastModelChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Broadcast event attributes.
     * 
     * @var array<string, mixed>
     */
    protected array $eventAttributes;

    /**
     * Broadcast event name.
     * 
     * @var string
     */
    protected string $eventName;

    /**
     * Broadcast event channel.
     * 
     * @var string
     */
    protected string $eventChannel;

    /**
     * Create a new event instance.
     *
     * @param string $eventChannel Broadcast event channel
     * @param string $eventName Broadcast event name
     * @param string $eventAttributes Broadcast event attributes
     * @return void
     */
    public function __construct(
        string $eventChannel,
        string $eventName,
        array $eventAttributes
    ){
        $this->eventChannel = $eventChannel;
        $this->eventName = $eventName;
        $this->eventAttributes = $eventAttributes;
    }
 
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->eventChannel);
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return $this->eventName;
    }
}