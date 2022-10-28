<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Providers;

use Deegitalbe\LaravelTrustupModelBroadcast\Package;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class LaravelTrustupModelBroadcastServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        
    }

    protected function addToBoot(): void
    {
        //
    }
}