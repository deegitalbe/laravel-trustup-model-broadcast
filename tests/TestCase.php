<?php
namespace Deegitalbe\LaravelTrustupModelBroadcast\Tests;

use Deegitalbe\LaravelTrustupModelBroadcast\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\LaravelTrustupModelBroadcast\Providers\VersioningPackageTemplateServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            VersioningPackageTemplateServiceProvider::class
        ];
    }
}