<?php

namespace Taylor, Daniel\MaytapiChannel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Taylor, Daniel\MaytapiChannel\Commands\MaytapiChannelCommand;

class MaytapiChannelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-maytapi-channel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_maytapi_channel_table')
            ->hasCommand(MaytapiChannelCommand::class);
    }
}
