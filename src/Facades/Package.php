<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Facades;

use Deegitalbe\LaravelTrustupModelBroadcast\Package as Underlying;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;
/**
 * @method static string getAppKey()
 * @method static string getBroadcastChannelSeparator()
 * @method static string getBroadcastEventSeparator()
 */
class Package extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return Underlying::class;
    }
}