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
}