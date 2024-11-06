<?php

namespace dantaylorseo\MaytapiChannel;

use dantaylorseo\MaytapiChannel\Commands\MaytapiChannelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasConfigFile();
    }
}
