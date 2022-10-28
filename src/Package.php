<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast;

use Deegitalbe\LaravelTrustupModelBroadcast\Contracts\PackageContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class Package extends VersionablePackage implements PackageContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-model-broadcast";
    }

    /**
     * Unique app key used for event names.
     * 
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->getConfig("app_key");
    }

    /**
     * Separator used for channel names.
     * 
     * @return string
     */
    public function getBroadcastChannelSeparator(): string
    {
        return $this->getConfig("broadcast.channel_separator");
    }

    /**
     * Separator used for event names.
     * 
     * @return string
     */
    public function getBroadcastEventSeparator(): string
    {
        return $this->getConfig("broadcast.event_separator");
    }
}