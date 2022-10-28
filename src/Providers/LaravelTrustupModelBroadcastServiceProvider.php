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
                'key' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_APP_KEY', '$2y$10$svQIJ8lZEqclI9AqcZEBZeKEqhePKWoFTFU85ML2u9w4aa2wbRHG'),
                'secret' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_APP_SECRET', 'app-secret'),
                'app_id' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_APP_ID', 'websocket_trustup_io'),
                'options' => [
                    'host' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_HOST', 'websocket.trustup.io'),
                    'port' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_PORT', 443),
                    'scheme' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_SCHEME', 'https'),
                    'encrypted' => true,
                    'useTLS' => env('TRUSTUP_MODEL_BROADCAST_PUSHER_SCHEME', 'https') === 'https',
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