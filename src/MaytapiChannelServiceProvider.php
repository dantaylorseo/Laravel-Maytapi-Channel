<?php

namespace dantaylorseo\MaytapiChannel;

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

    public function bootingPackage(): void
    {
        $this->app->when(MaytapiService::class)
            ->needs('$apiKey')
            ->give(config('maytapi-channel.api_key'));

        $this->app->when(MaytapiService::class)
            ->needs('$productId')
            ->give(config('maytapi-channel.product_id'));

        $this->app->when(MaytapiService::class)
            ->needs('$phoneId')
            ->give(config('maytapi-channel.phone_id'));

        $this->app->when(MaytapiService::class)
            ->needs('$groupId')
            ->give(config('maytapi-channel.group_id'));
    }
}
