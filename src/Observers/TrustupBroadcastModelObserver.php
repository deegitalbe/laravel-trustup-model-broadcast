<?php
 
namespace Deegitalbe\LaravelTrustupModelBroadcast\Observers;
 
use Deegitalbe\LaravelTrustupModelBroadcast\Contracts\Models\TrustupBroadcastModelContract;
use Deegitalbe\LaravelTrustupModelBroadcast\Events\TrustupBroadcastModelChanged;

/**
 * Observing trustup broadcast model.
 */
class TrustupBroadcastModelObserver
{
    /**
     * Broadcasting created event.
     * 
     * @param TrustupBroadcastModelContract $model
     * @return void
     */
    public function created(TrustupBroadcastModelContract $model): void
    {
        $this->sendEvent($model, __FUNCTION__);
    }
    
    /**
     * Broadcasting update event.
     * 
     * @param TrustupBroadcastModelContract $model
     * @return void
     */
    public function updated(TrustupBroadcastModelContract $model): void
    {
        $this->sendEvent($model, __FUNCTION__);
    }

    /**
     * Broadcasting deleted event.
     * 
     * @param TrustupBroadcastModelContract $model
     * @return void
     */
    public function deleted(TrustupBroadcastModelContract $model): void
    {
        $this->sendEvent($model, __FUNCTION__);
    }

    /**
     * Broadcasting given event.
     * 
     * @param TrustupBroadcastModelContract $model
     * @param string $eventName Laravel model event that should be broadcasted (created, updated, deleted, ...)
     * @return void
     */
    protected function sendEvent(TrustupBroadcastModelContract $model, string $eventName): void
    {
        if (!$model->isCompatibleWithTrustupBroadcast()) return;

        TrustupBroadcastModelChanged::dispatch(
            $model->getTrustupModelBroadcastChannel($eventName),
            $model->getTrustupModelBroadcastEventName($eventName),
            $model->getTrustupModelBroadcastEventAttributes($eventName)
        );
    }
}