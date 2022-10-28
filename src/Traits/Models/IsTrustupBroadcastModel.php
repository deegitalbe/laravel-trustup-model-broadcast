<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Traits\Models;

use App\Observers\TrustupBroadcastModelObserver;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Deegitalbe\LaravelTrustupModelBroadcast\Facades\Package;

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
    public function getTrustupModelBroadcastChannel(): string
    {
        return join($this->getTrustupModelBroadcastChannelSeparator(), [
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
        return join($this->getTrustupModelBroadcastEventSeparator(), [
            $this->getTrustupModelBroadcastAppKey(),
            $this->getTrustupModelBroadcastModelKey(),
            $eventName
        ]);
    }

    /**
     * Getting separator used when constructing model event name.
     * 
     * @return string
     */
    protected function getTrustupModelBroadcastEventSeparator(): string
    {
        return ":";
    }

    /**
     * Getting separator used when constructing broadcasting channel.
     * 
     * @return string
     */
    protected function getTrustupModelBroadcastChannelSeparator(): string
    {
        return "-";
    }

    /**
     * Getting app prefix used when broadcasting model events.
     * 
     * @return string
     */
    protected function getTrustupModelBroadcastAppKey(): string
    {
        return Package::getConfig("app_key");
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

    /**
     * Telling if current model is compatible with broadcasting.
     * 
     * @return bool
     */
    protected function isCompatibleWithTrustupBroadcast(): bool
    {
        return !!$this->getTrustupModelBroadcastProfessionalAuthorizationKey();
    }
}