<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Contracts\Models;

interface TrustupBroadcastModelContract
{
    /**
     * Broadcasting given event.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return void
     */
    public function sendTrustupModelChangedEvent(string $eventName): void;

    /**
     * Getting channel used when broadcasting model events.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return string
     */
    public function getTrustupModelBroadcastChannel(string $eventName): string;

    /**
     * Getting broadcast model event name.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return string
     */
    public function getTrustupModelBroadcastEventName(string $eventName): string;

    /**
     * Getting attributes sent along when broadcasing events.
     
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return array<string, mixed>
     */
    public function getTrustupModelBroadcastEventAttributes(string $eventName): array;


    /**&
     * Getting separator used when constructing model event name.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastEventSeparator(): string;

    /**
     * Getting separator used when constructing broadcasting channel name.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastChannelSeparator(): string;

    /**
     * Getting app prefix used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastAppKey(): string;

    /**
     * Getting model key used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastModelKey(): string;
    
    /**
     * Getting model key used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastProfessionalAuthorizationKey(): string;
}