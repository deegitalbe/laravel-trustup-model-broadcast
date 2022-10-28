<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Tests;

use Deegitalbe\LaravelTrustupModelBroadcast\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\LaravelTrustupModelBroadcast\Providers\LaravelTrustupModelBroadcastServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            LaravelTrustupModelBroadcastServiceProvider::class
        ];
    }
}