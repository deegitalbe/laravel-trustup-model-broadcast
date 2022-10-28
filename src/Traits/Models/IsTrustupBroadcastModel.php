<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Traits\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Deegitalbe\LaravelTrustupModelBroadcast\Facades\Package;
use Deegitalbe\LaravelTrustupModelBroadcast\Observers\TrustupBroadcastModelObserver;

trait IsTrustupBroadcastModel
{
    public static function bootIsTrustupBroadcastModel()
	{
		static::observe(TrustupBroadcastModelObserver::class);
	}

    /**
     * Getting channel used when broadcasting model events.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return string
     */
    public function getTrustupModelBroadcastChannel(string $eventName): string
    {
        return join(Package::getBroadcastChannelSeparator(), [
            "professional",
            $this->getTrustupModelBroadcastProfessionalAuthorizationKey()
        ]);
    }

    /**
     * Getting broadcast model event name.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return string
     */
    public function getTrustupModelBroadcastEventName(string $eventName): string
    {
        return join(Package::getBroadcastEventSeparator(), [
            Package::getAppKey(),
            $this->getTrustupModelBroadcastModelKey(),
            $eventName
        ]);
    }

    /**
     * Telling if current model is compatible with broadcasting.
     * 
     * @return bool
     */
    public function isCompatibleWithTrustupBroadcast(): bool
    {
        return !!$this->getTrustupModelBroadcastProfessionalAuthorizationKey();
    }

    /**
     * Getting model key used when broadcasting model events.
     * 
     * @return string
     */
    protected function getTrustupModelBroadcastModelKey(): string
    {
        /** @var Model $this */
        return Str::slug(str_replace("\\", "-", $this->getMorphClass()));
    }

    /**
     * Getting model key used when broadcasting model events.
     * 
     * By default if null, event would not broadcast.
     * 
     * @return ?string
     */
    protected function getTrustupModelBroadcastProfessionalAuthorizationKey(): ?string
    {
        return $this->professional_authorization_key;
    }
}