<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Contracts;

use Henrotaym\LaravelPackageVersioning\Services\Versioning\Contracts\VersionablePackageContract;
use Henrotaym\LaravelContainerAutoRegister\Services\AutoRegister\Contracts\AutoRegistrableContract;

/**
 * Package facade. 
 */
interface PackageContract extends VersionablePackageContract, AutoRegistrableContract
{
    /**
     * Unique app key used for event names.
     * 
     * @return string
     */
    public function getAppKey(): string;

    /**
     * Separator used for channel names.
     * 
     * @return string
     */
    public function getBroadcastChannelSeparator(): string;

    /**
     * Separator used for event names.
     * 
     * @return string
     */
    public function getBroadcastEventSeparator(): string;
}