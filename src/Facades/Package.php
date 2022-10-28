<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Facades;

use Deegitalbe\LaravelTrustupModelBroadcast\Package as Underlying;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class Package extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return Underlying::class;
    }
}