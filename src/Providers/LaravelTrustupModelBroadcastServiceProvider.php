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
        // Adding trustup broadcast connection
        config([
            'broadcasting.connections.trustup' => [
                'driver' => 'pusher',
                'key' => env('PUSHER_TRUSTUP_APP_KEY', '$2y$10$svQIJ8lZEqclI9AqcZEBZeKEqhePKWoFTFU85ML2u9w4aa2wbRHG'),
                'secret' => env('PUSHER_TRUSTUP_APP_SECRET', 'app-secret'),
                'app_id' => env('PUSHER_TRUSTUP_APP_ID', 'websocket_trustup_io'),
                'options' => [
                    'host' => env('PUSHER_TRUSTUP_HOST', 'websocket.trustup.io'),
                    'port' => env('PUSHER_TRUSTUP_PORT', 443),
                    'scheme' => env('PUSHER_TRUSTUP_SCHEME', 'https'),
                    'encrypted' => true,
                    'useTLS' => env('PUSHER_TRUSTUP_SCHEME', 'https') === 'https',
                ]
            ]
        ]);
        // Setting trustup broadcast connection as default one.
        config(['broadcasting.default' => 'trustup']);
    }

    protected function addToBoot(): void
    {
        //
    }
}