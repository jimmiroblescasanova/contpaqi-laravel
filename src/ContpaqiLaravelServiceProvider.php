<?php

namespace jimmirobles\ContpaqiLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use jimmirobles\ContpaqiLaravel\Commands\ContpaqiLaravelCommand;

class ContpaqiLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('contpaqi-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_contpaqi-laravel_table')
            ->hasCommand(ContpaqiLaravelCommand::class);
    }
}
