<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Contracts\Models;

interface TrustupBroadcastModelContract
{
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

    /**
     * Telling if current model is compatible with broadcasting.
     * 
     * @return bool
     */
    public function isCompatibleWithTrustupBroadcast(): bool;
}