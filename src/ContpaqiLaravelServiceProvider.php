<?php

namespace jimmirobles\ContpaqiLaravel;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Config;
use jimmirobles\ContpaqiLaravel\Commands\ContpaqiLaravelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            // ->hasViews()
            // ->hasMigration('create_contpaqi-laravel_table')
            ->hasCommand(ContpaqiLaravelCommand::class);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/contpaqi.php' => config_path('contpaqi.php'),
            ], 'contpaqi-config');
        }

        $this->setConnection();

        // Define la relación polimórfica de las direcciones
        Relation::morphMap([
            '1' => 'jimmirobles\ContpaqiLaravel\Models\admClientes',
            '3' => 'jimmirobles\ContpaqiLaravel\Models\admDocumentos',
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/contpaqi.php', 'contpaqi');
    }

    /**
     * Define la conexión primaria para los modelos
     */
    public function setConnection(): void
    {
        $connection = Config::get('contpaqi.default');

        if ($connection !== 'default') {
            $wardrobeConfig = Config::get('contpaqi.connections.'.$connection);
        } else {
            $connection = Config::get('database.default');
            $wardrobeConfig = Config::get('database.connections.'.$connection);
        }

        Config::set('database.connections.contpaqi', $wardrobeConfig);
    }
}
