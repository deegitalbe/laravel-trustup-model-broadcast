<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Traits\Models;

use Deegitalbe\LaravelTrustupModelBroadcast\Contracts\Models\IsTrustupBroadcastModelContract;
use Deegitalbe\LaravelTrustupModelBroadcast\Events\TrustupBroadcastModelChanged;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Deegitalbe\LaravelTrustupModelBroadcast\Facades\Package;

trait IsTrustupBroadcastModel
{
    public static function bootIsTrustupBroadcastModel()
	{
		static::created(fn (IsTrustupBroadcastModelContract $model) => $model->sendTrustupModelChangedEvent("created"));
        static::updated(fn (IsTrustupBroadcastModelContract $model) => $model->sendTrustupModelChangedEvent("updated"));
        static::deleted(fn (IsTrustupBroadcastModelContract $model) => $model->sendTrustupModelChangedEvent("deleted"));
	}

    /**
     * Broadcasting given event.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return void
     */
    public function sendTrustupModelChangedEvent(string $eventName): void
    {
        /** @var IsTrustupBroadcastModelContract $this */

        TrustupBroadcastModelChanged::dispatch(
            $this->getTrustupModelBroadcastChannel($eventName),
            $this->getTrustupModelBroadcastEventName($eventName),
            $this->getTrustupModelBroadcastEventAttributes($eventName)
        );
    }



    /**
     * Getting channel used when broadcasting model events.
     * 
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return string
     */
    public function getTrustupModelBroadcastChannel(string $eventName): string
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
    public function getTrustupModelBroadcastEventSeparator(): string
    {
        return ":";
    }

    /**
     * Getting separator used when constructing broadcasting channel.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastChannelSeparator(): string
    {
        return "-";
    }

    /**
     * Getting app prefix used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastAppKey(): string
    {
        return Package::getConfig("app_key");
    }

    /**
     * Getting model key used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastModelKey(): string
    {
        /** @var Model $this */
        return Str::slug(str_replace("\\", "-", $this->getMorphClass()));
    }

    /**
     * Getting model key used when broadcasting model events.
     * 
     * @return string
     */
    public function getTrustupModelBroadcastProfessionalAuthorizationKey(): string
    {
        return $this->professional_authorization_key;
    }
}